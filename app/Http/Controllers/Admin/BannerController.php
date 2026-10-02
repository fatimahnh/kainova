<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->paginate(10);
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'subjudul' => 'nullable|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'link_url' => 'nullable|url',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('banners', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        Banner::create($data);

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil ditambahkan.');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'subjudul' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'link_url' => 'nullable|url',
        ]);

        if ($request->hasFile('gambar')) {
            if ($banner->gambar) {
                Storage::disk('public')->delete($banner->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('banners', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        $banner->update($data);

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil diperbarui.');
    }

    public function destroy(Banner $banner)
    {
        if ($banner->gambar) {
            Storage::disk('public')->delete($banner->gambar);
        }
        $banner->delete();

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil dihapus.');
    }
}