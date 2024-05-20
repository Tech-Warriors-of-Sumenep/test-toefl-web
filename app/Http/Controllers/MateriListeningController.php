<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriListeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materi = Materi::with(['category'])->where('category_id', 3)->get();
        $no = 3;
        return view('materiListening.index', compact([
            'materi', 'no'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('materiListening.create', compact([
            'categories'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:8',
            'deskripsi' => 'required|min:8',
            'file' => 'required|file|mimes:mp3,mp4|max:10000',
        ], [
            'file.required' => 'File harus diunggah',
            'file.file' => 'File yang diunggah harus berupa file',
            'file.mimes' => 'File yang diunggah harus berupa mp3 dan mp4',
            'file.max' => 'Ukuran file maksimal 10 MB',
        ]);

        $file_path = $request->file('file')->store('public/files/listening');

        $url = Storage::url($file_path);

        Materi::create([
            'uuid' => uniqid(),
            'title' => $request->title,
            'description' => $request->deskripsi,
            'category_id' => 3, // Menyesuaikan dengan nilai category_id yang Anda sebutkan (3)
            'file' => $url, // Simpan URL file di database
        ]);

        return redirect()->route('materiListening.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $code)
{
    // Mengambil daftar kategori untuk dropdown
    $categories = Category::all();

    // Mengambil materi berdasarkan UUID
    $materi = Materi::where('uuid', $code)->first();

    // Memastikan materi ditemukan
    if (!$materi) {
        return redirect()->route('materiListening.index')->with(['error' => 'Data tidak ditemukan!']);
    }

    // Menampilkan view form edit dengan data materi yang akan diubah dan daftar kategori
    return view('materiListening.edit', compact('materi', 'categories'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $code)
    {
        $materi = Materi::with(['category'])->where('uuid', $code)->first();

        $this->validate($request, [
            'title' => 'required|min:8',
            'deskripsi' => 'required|min:8',
            'file' => 'required|file|mimes:mp3,mp4|max:10000',
        ], [
            'file.file' => 'File yang diunggah harus berupa file',
            'file.mimes' => 'File yang diunggah harus berupa mp3 dan mp4',
            'file.max' => 'Ukuran file maksimal 10 MB',
        ]);

        if ($request->hasFile('file')) {
            // Hapus file lama
            Storage::delete('public/files/listening/' . $materi->file);

            // Upload file baru
            $file_path = $request->file('file')->store('public/files/listening');

            $materi->update([
                'file' => str_replace('public/', '', $file_path), // Memastikan path file yang disimpan adalah yang benar
            ]);
        }

        $materi->update([
            'title' => $request->title,
            'description' => $request->deskripsi,
        ]);

        return redirect()->route('materiListening.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $code)
    {
        $materi = Materi::where('uuid', $code)->first();

        if (!$materi) {
            return redirect()->route('materiListening.index')->with(['error' => 'Data tidak ditemukan!']);
        }

        // Hapus file
        Storage::delete('public/' . $materi->file);

        $materi->delete();

        return redirect()->route('materiListening.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
