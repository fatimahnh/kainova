<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatbotLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Produk;
use Illuminate\Support\Facades\Artisan;

class AISettingController extends Controller
{
    public function index()
    {
        $logs = ChatbotLog::latest()->paginate(10);
        return view('admin.ai-setting.index', compact('logs'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'gemini_api_key' => 'required|string',
            'gemini_model'   => 'required|string',
        ]);

        $key = trim($request->gemini_api_key);
        $path = base_path('.env');

        if (file_exists($path)) {
            $envContent = file_get_contents($path);
            if (str_contains($envContent, 'GEMINI_API_KEY=')) {
                $envContent = preg_replace('/GEMINI_API_KEY=.*/', 'GEMINI_API_KEY=' . $key, $envContent);
            } else {
                $envContent .= "\nGEMINI_API_KEY=" . $key;
            }
            file_put_contents($path, $envContent);
        }

        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        return back()->with('success', 'Konfigurasi Gemini AI berhasil diperbarui!');
    }

    public function testChat(Request $request)
    {
        $request->validate([
            'message'     => 'required|string',
            'model'       => 'nullable|string',
            'guest_name'  => 'required|string',
            'guest_phone' => 'required|string',
        ]);

        // Mengambil API Key sesuai pola config Laravel
        $apiKey = config('services.gemini.key') ?? env('GEMINI_API_KEY');

        if (!$apiKey) {
            return response()->json([
                'error' => 'API Key Gemini belum diatur di .env atau config/services.php'
            ], 400);
        }

        // Penyesuaian nama model
        $rawModel =$request->model ?? 'gemini-1.5-flash';
        $model = str_replace('models/', '',$rawModel);

        if ($model === 'gemini-1.5-flash') {$model = 'gemini-1.5-flash';
        } elseif ($model === 'gemini-1.5-pro') {$model = 'gemini-1.5-pro';
        }

        // 1. Ambil data produk dari tabel `produk`
        $products = Product::select('nama', 'harga', 'deskripsi', 'ukuran', 'warna')->get();

        if ($products->isEmpty()) {$productContext = "Saat ini belum ada data produk yang terdaftar di sistem.";
        } else {
            $productContext = "Daftar katalog produk terbaru kami:\n";
            foreach ($products as$index => $item) {$hargaFormatted = number_format($item->harga, 0, ',', '.');$productContext .= ($index + 1) . ". Nama: {$item->nama} | Harga: Rp {$hargaFormatted} \vert{} Ukuran: {$item->ukuran} | Warna: {$item->warna} \vert{} Deskripsi: {$item->deskripsi}\n";
            }
        }

        try {
            $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}";

            $response = Http::withoutVerifying()
                ->timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                ])
                ->post($url, [
                    'contents' => [
                        [
                            'role' => 'user',
                            'parts' => [
                                [
                                    'text' => "Kamu adalah Customer Service ramah. Nama pengguna: {$request->guest_name}.\n\nKonteks Data Produk saat ini:\n{$productContext}\n\nPertanyaan Pengguna: " . $request->message
                                ]
                            ]
                        ]
                    ]
                ]);

            if ($response->failed()) {$errorBody = $response->json();$errorMessage = $errorBody['error']['message'] ?? ('HTTP Status Error: ' .$response->status());

                // Catat error ke log server Laravel
                Log::error('Gemini API Error: ' . $errorMessage);

                return response()->json([
                    'error' => 'Gagal terhubung ke Gemini: ' . $errorMessage
                ], 500);
            }

            $responseData =$response->json();
            $botReply =$responseData['candidates'][0]['content']['parts'][0]['text'] ?? 'Maaf, tidak ada jawaban dari AI.';

            return response()->json([
                'status' => 'success',
                'reply'  => $botReply,
            ]);

        } catch (\Throwable $exception) {
            Log::error('AI chat failed', [
                'user'  => $request->guest_name,
                'error' => $exception->getMessage(),
            ]);

            return response()->json([
                'error' => 'Terjadi kesalahan sistem: ' . $exception->getMessage()
            ], 500);
        }
    }
}