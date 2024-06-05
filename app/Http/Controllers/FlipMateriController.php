<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Materi;
use App\Models\FlipMateri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FlipMateriController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materi = Materi::with(['category'])->where('category_id', 1)->get();
        $no = 1;
        return view('materiGrammar.createflip', compact(['materi', 'no']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'materi_id' => 'required|exists:materis,id',
            'description' => 'required|min:8',
            'file' => 'required|file|mimes:pdf,doc,docx,png,jpeg,jpg|max:50004',
        ], [
            'file.required' => 'File harus diunggah',
            'file.file' => 'File yang diunggah harus berupa file',
            'file.mimes' => 'File yang diunggah harus berupa PDF, DOC, atau DOCX',
            'file.max' => 'Ukuran file maksimal 2 MB',
        ]);

        $file_path = $request->file('file')->store('public/files/flipMateri');

        $full_url = url('storage/' . str_replace('public/', '', $file_path));
        $file_name = basename($file_path);

        FlipMateri::create([
            'materi_id' => $request->materi_id,
            'uuid' => uniqid(),
            'description' => $request->description,
            'file' => $file_name,
        ]);

        return redirect()->route('materiGrammar.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        $materi = Materi::with(['category'])->where('category_id', 1)->get();
        $no = 1;
        $flipMateri = FlipMateri::with(['materi'])->where('uuid', $uuid)->first();
        return view('materiGrammar.editflip', compact(['materi', 'flipMateri']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uuid)
    {
        $flipMateri = FlipMateri::with(['materi'])->where('uuid', $uuid)->first();

        $this->validate($request, [
            'materi_id' => 'required|exists:materis,id',
            'description' => 'required|min:8',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:50004',
        ], [
            'file.file' => 'File yang diunggah harus berupa file',
            'file.mimes' => 'File yang diunggah harus berupa PDF, DOC, atau DOCX',
            'file.max' => 'Ukuran file maksimal 2 MB',
        ]);

        if ($request->hasFile('file')) {
            // Hapus file lama
            Storage::delete('public/files/flipMateri/' . $flipMateri->file);

            // Upload file baru
            $file_path = $request->file('file')->store('public/files/flipMateri');

            $file_name = basename($file_path);
            $flipMateri->update([
                'file' => $file_name, // Memastikan path file yang disimpan adalah yang benar
            ]);
        }

        $flipMateri->update([
            'materi_id' => $request->materi_id,
            'description' => $request->description,
           
        ]);

        return redirect()->route('materiGrammar.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $flipMateri = FlipMateri::where('uuid', $uuid)->first();

        if (!$flipMateri) {
            return redirect()->route('materiGrammar.index')->with(['error' => 'Data tidak ditemukan!']);
        }

        // Hapus file
        Storage::delete('public/' . $flipMateri->file);

        $flipMateri->delete();

        return redirect()->route('materiGrammar.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
