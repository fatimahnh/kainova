@extends('layouts.admin')

@section('content')

<div class="mb-6">
    <h2 class="font-bold text-xl text-kainova-navy">Pengaturan AI (Google Gemini)</h2>
    <p class="text-xs text-gray-500">Kelola API Key, pilih model Gemini 1.5/2.5, uji coba chatbot, dan pantau riwayat percakapan</p>
</div>

@if(session('success'))
<div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs rounded-xl flex items-center justify-between">
    <div class="flex items-center gap-2">
        <i data-lucide="check-circle" class="w-4 h-4"></i>
        <span>{{ session('success') }}</span>
    </div>
    <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700">
        <i data-lucide="x" class="w-4 h-4"></i>
    </button>
</div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    <!-- FORM PENGATURAN API KEY & MODEL -->
    <div class="bg-white p-6 rounded-2xl border border-gray-200/80 shadow-sm flex flex-col justify-between">
        <form action="{{ route('admin.ai-setting.update') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">
                    Gemini API Key <span class="text-red-500">*</span>
                </label>
                <input type="password" 
                       name="gemini_api_key" 
                       value="{{ env('GEMINI_API_KEY') }}" 
                       placeholder="Masukkan API Key Gemini (AIzaSy...)" 
                       required 
                       class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange font-mono">
                <p class="text-[10px] text-gray-400 mt-1.5">
                    Belum punya API Key? Dapatkan secara gratis melalui 
                    <a href="https://aistudio.google.com/" target="_blank" class="text-kainova-orange underline font-bold">Google AI Studio</a>.
                </p>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">
                    Pilih Model Chatbot <span class="text-red-500">*</span>
                </label>
                <select name="gemini_model" id="gemini_model_select" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange bg-white font-semibold text-gray-700">
                    <option value="gemini-2.5-flash" selected>Gemini 2.5 Flash (Sangat Cepat & Direkomendasikan)</option>
                    <option value="gemini-1.5-flash-latest">Gemini 1.5 Flash (Versi Stabil Terbaru)</option>
                    <option value="gemini-1.5-pro-latest">Gemini 1.5 Pro (Akurasi Lebih Tinggi)</option>
                </select>
            </div>

            <div class="p-4 bg-amber-50/60 border border-amber-200/80 rounded-xl text-xs space-y-2">
                <div class="font-bold flex items-center gap-1.5 text-kainova-navy">
                    <i data-lucide="sparkles" class="w-4 h-4 text-kainova-orange"></i>
                    Keuntungan Menggunakan Gemini
                </div>
                <ul class="list-disc list-inside text-gray-600 text-[11px] space-y-1">
                    <li>Memproses pertanyaan katalog produk & FAQ sekolah.</li>
                    <li>Quota pemakaian gratis dari Google AI Studio sangat besar.</li>
                    <li>Respon kilat dengan model Gemini 2.5/1.5 Flash.</li>
                </ul>
            </div>

            <div class="pt-2 flex justify-end">
                <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold text-xs rounded-xl shadow-md hover:opacity-95 transition flex items-center gap-2">
                    <i data-lucide="save" class="w-4 h-4"></i>
                    Simpan Konfigurasi
                </button>
            </div>
        </form>
    </div>

    <!-- WIDGET TES CHATBOT FRONTEND -->
    <div class="bg-white p-6 rounded-2xl border border-gray-200/80 shadow-sm flex flex-col h-[480px]">
        <div class="flex items-center justify-between pb-3 border-b border-gray-100 mb-3">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-full bg-amber-100 text-kainova-orange flex items-center justify-center font-bold text-xs">
                    <i data-lucide="bot" class="w-4 h-4"></i>
                </div>
                <div>
                    <h3 class="font-bold text-xs text-kainova-navy">Uji Coba Chatbot (Frontend Test)</h3>
                    <p class="text-[10px] text-gray-400">Isi data diri sebelum memulai percakapan</p>
                </div>
            </div>
            <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 text-[10px] font-bold rounded-md">Live Preview</span>
        </div>

        <!-- FORM IDENTITAS TAMU -->
        <div id="user-info-form" class="flex-1 flex flex-col justify-center space-y-4 p-4 bg-gray-50/50 rounded-xl">
            <div class="text-center mb-1">
                <h4 class="font-bold text-sm text-kainova-navy">Selamat Datang di Live Chat</h4>
                <p class="text-xs text-gray-500">Lengkapi data berikut untuk memulai percakapan</p>
            </div>
            <div>
                <label class="block text-[11px] font-bold text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" id="guest-name" placeholder="Masukkan nama lengkap" required class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange bg-white">
            </div>
            <div>
                <label class="block text-[11px] font-bold text-gray-700 mb-1">Nomor WhatsApp / Telepon <span class="text-red-500">*</span></label>
                <input type="tel" id="guest-phone" placeholder="Contoh: 081234567890" required class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange bg-white">
            </div>
            <button type="button" id="start-chat-btn" class="w-full py-2.5 bg-kainova-navy text-white text-xs font-bold rounded-xl hover:opacity-90 transition">
                Mulai Percakapan
            </button>
        </div>

        <!-- BOX PESAN -->
        <div id="chat-box" class="hidden flex-1 flex flex-col h-full overflow-hidden">
            <div id="chat-messages" class="flex-1 overflow-y-auto space-y-3 p-2 bg-gray-50/50 rounded-xl text-xs"></div>

            <form id="chat-form" class="mt-3 flex items-center gap-2">
                <input type="text" id="chat-input" placeholder="Ketik pertanyaan untuk AI..." required class="flex-1 text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
                <button type="submit" class="p-3 bg-kainova-navy text-white rounded-xl hover:bg-opacity-90 transition">
                    <i data-lucide="send" class="w-4 h-4"></i>
                </button>
            </form>
        </div>
    </div>

</div>

<!-- TABEL RIWAYAT CHATBOT -->
<div class="mt-8 bg-white p-6 rounded-2xl border border-gray-200/80 shadow-sm">
    <div class="flex items-center justify-between mb-4">
        <div>
            <h3 class="font-bold text-base text-kainova-navy">Riwayat Percakapan Chatbot</h3>
            <p class="text-xs text-gray-500">Log percakapan pengunjung yang tersimpan di database backend</p>
        </div>
        <span class="px-3 py-1 bg-amber-50 border border-amber-200 text-amber-700 font-bold text-xs rounded-xl">
            Total Log: {{ $logs->total() }}
        </span>
    </div>

    <div class="overflow-x-auto">
       <table class="w-full text-left text-xs">
    <thead class="bg-kainova-navy text-white font-semibold">
        <tr>
            <th class="p-3.5">Waktu</th>
            <th class="p-3.5">Nama Guest</th>
            <th class="p-3.5">No. Telepon</th>
            <th class="p-3.5">Model</th>
            <th class="p-3.5">Pesan Guest</th>
            <th class="p-3.5">Respon AI</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 text-gray-700">
        @forelse ($logs as $log)
        <tr class="hover:bg-amber-50/20 transition">
            <td class="p-3.5 whitespace-nowrap text-gray-400">
                {{ $log->created_at ? $log->created_at->format('d M Y, H:i') : '-' }}
            </td>
            <td class="p-3.5 font-bold text-kainova-navy">{{ $log->guest_name }}</td>
            <td class="p-3.5 text-gray-600 font-mono">{{ $log->guest_phone }}</td>
            <td class="p-3.5">
                <span class="px-2 py-0.5 bg-amber-100 text-amber-800 rounded font-mono text-[10px]">
                    {{ $log->model_used }}
                </span>
            </td>
            <td class="p-3.5 max-w-[200px] truncate" title="{{ $log->user_message }}">
                {{ $log->user_message }}
            </td>
            <td class="p-3.5 max-w-[300px] truncate" title="{{ $log->bot_response }}">
                {{ $log->bot_response }}
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="p-6 text-center text-gray-400">
                Belum ada riwayat percakapan chatbot.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
    </div>

    <div class="mt-4">{{ $logs->links() }}</div>
</div>

<script>
let guestData = { name: '', phone: '' };

document.getElementById('start-chat-btn').addEventListener('click', function() {
    const nameInput = document.getElementById('guest-name').value.trim();
    const phoneInput = document.getElementById('guest-phone').value.trim();

    if (!nameInput || !phoneInput) {
        alert('Harap isi Nama Lengkap dan Nomor Telepon terlebih dahulu!');
        return;
    }

    guestData.name = nameInput;
    guestData.phone = phoneInput;

    document.getElementById('user-info-form').classList.add('hidden');
    document.getElementById('chat-box').classList.remove('hidden');

    const messages = document.getElementById('chat-messages');
    messages.innerHTML = `
        <div class="flex items-start gap-2">
            <div class="w-6 h-6 rounded-full bg-kainova-navy text-white flex items-center justify-center text-[10px] font-bold">AI</div>
            <div class="p-3 bg-white border border-gray-200 rounded-2xl rounded-tl-none max-w-[80%] text-gray-700">
                Halo <b>${guestData.name}</b>! Saya asisten virtual Kainova. Ada yang bisa saya bantu hari ini?
            </div>
        </div>
    `;
});

document.getElementById('chat-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    const input = document.getElementById('chat-input');
    const messages = document.getElementById('chat-messages');
    const modelSelect = document.getElementById('gemini_model_select');
    const userMsg = input.value.trim();

    if(!userMsg) return;

    messages.innerHTML += `
        <div class="flex items-start justify-end gap-2">
            <div class="p-3 bg-kainova-navy text-white rounded-2xl rounded-tr-none max-w-[80%]">
                ${userMsg}
            </div>
        </div>
    `;
    input.value = '';
    messages.scrollTop = messages.scrollHeight;

    const loadingId = 'loading-' + Date.now();
    messages.innerHTML += `
        <div id="${loadingId}" class="flex items-start gap-2">
            <div class="w-6 h-6 rounded-full bg-kainova-navy text-white flex items-center justify-center text-[10px] font-bold">AI</div>
            <div class="p-3 bg-white border border-gray-200 rounded-2xl rounded-tl-none text-gray-400 italic">
                Gemini sedang mengetik...
            </div>
        </div>
    `;
    messages.scrollTop = messages.scrollHeight;

    try {
        const response = await fetch("{{ route('admin.ai-setting.test') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ 
                message: userMsg,
                model: modelSelect.value,
                guest_name: guestData.name,
                guest_phone: guestData.phone
            })
        });

        const data = await response.json();
        document.getElementById(loadingId).remove();

        if (data.status === 'success') {
            messages.innerHTML += `
                <div class="flex items-start gap-2">
                    <div class="w-6 h-6 rounded-full bg-kainova-navy text-white flex items-center justify-center text-[10px] font-bold">AI</div>
                    <div class="p-3 bg-white border border-gray-200 rounded-2xl rounded-tl-none max-w-[80%] text-gray-700">
                        ${data.reply}
                    </div>
                </div>
            `;
        } else {
            messages.innerHTML += `
                <div class="flex items-start gap-2">
                    <div class="w-6 h-6 rounded-full bg-red-600 text-white flex items-center justify-center text-[10px] font-bold">!</div>
                    <div class="p-3 bg-red-50 border border-red-200 text-red-600 rounded-2xl rounded-tl-none max-w-[80%]">
                        ${data.error || 'Terjadi kesalahan pada server.'}
                    </div>
                </div>
            `;
        }
    } catch (err) {
        document.getElementById(loadingId).remove();
        messages.innerHTML += `
            <div class="p-3 bg-red-50 text-red-600 rounded-xl text-[11px]">Gagal mengirim pesan. Periksa koneksi atau API Key.</div>
        `;
    }
    messages.scrollTop = messages.scrollHeight;
});
</script>

@endsection