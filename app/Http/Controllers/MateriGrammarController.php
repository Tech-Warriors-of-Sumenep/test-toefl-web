<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriGrammarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materi = Materi::with(['category'])->where('category_id', 1)->get();
        $no = 1;
        return view('materiGrammar.index', compact([
            'materi', 'no'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('materiGrammar.create', compact([
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
            'file' => 'required|file|mimes:pdf,doc,docx,png,jpeg,jpg|max:50004',
        ], [
            'file.required' => 'File harus diunggah',
            'file.file' => 'File yang diunggah harus berupa file',
            'file.mimes' => 'File yang diunggah harus berupa PDF, DOC, atau DOCX',
            'file.max' => 'Ukuran file maksimal 2 MB',
        ]);

        $file_path = $request->file('file')->store('public/files/grammar');

        $full_url = url('storage/' . str_replace('public/', '', $file_path));

        Materi::create([
            'uuid' => uniqid(),
            'title' => $request->title,
            'description' => $request->deskripsi,
            'category_id' => 1, // Menyesuaikan dengan nilai category_id yang Anda sebutkan (1)
            'file' => $full_url, // Memastikan path file yang disimpan adalah yang benar
        ]);

        return redirect()->route('materiGrammar.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $code)
    {
        $categories = Category::all();
        $materi = Materi::with(['category'])->where('uuid', $code)->first();
        return view('materiGrammar.edit', compact(
            [
                'categories', 'materi'
            ]
        ));
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
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:50004',
        ], [
            'file.file' => 'File yang diunggah harus berupa file',
            'file.mimes' => 'File yang diunggah harus berupa PDF, DOC, atau DOCX',
            'file.max' => 'Ukuran file maksimal 2 MB',
        ]);

        if ($request->hasFile('file')) {
            // Hapus file lama
            Storage::delete('public/files/grammar/' . $materi->file);

            // Upload file baru
            $file_path = $request->file('file')->store('public/files/grammar');

            $materi->update([
                'file' => str_replace('public/', '', $file_path), // Memastikan path file yang disimpan adalah yang benar
            ]);
        }

        $materi->update([
            'title' => $request->title,
            'description' => $request->deskripsi,
        ]);

        return redirect()->route('materiGrammar.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $code)
    {
        $materi = Materi::where('uuid', $code)->first();

        if (!$materi) {
            return redirect()->route('materiGrammar.index')->with(['error' => 'Data tidak ditemukan!']);
        }

        // Hapus file
        Storage::delete('public/' . $materi->file);

        $materi->delete();

        return redirect()->route('materiGrammar.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
