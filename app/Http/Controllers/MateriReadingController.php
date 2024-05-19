<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriReadingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $no = 2;
        $materi = Materi::with(['category'])->where('category_id', 2)->get();
        return view('materiReading.index', compact([
            'materi', 'no'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('materiReading.create', compact([
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
            // 'file' => 'required|file|mimes:png,jpeg|max:50004',
        // ], [
        //     'file.required' => 'File harus diunggah',
        //     'file.file' => 'File yang diunggah harus berupa file',
        //     'file.mimes' => 'File yang diunggah harus berupa JPEG atau PNG',
        //     'file.max' => 'Ukuran file maksimal 2 MB',
        // ]);
        ]);

        // $file_path = $request->file('file')->store('public/files/reading');

        Materi::create([
            'uuid' => uniqid(),
            'title' => $request->title,
            'description' => $request->deskripsi,
            'category_id' => 2,
            // 'file' => str_replace('public/', '', $file_path), 
        ]);

        return redirect()->route('materiReading.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $code)
    {
        $categories = Category::all();
        $materi = Materi::with(['category'])->where('uuid', $code)->first();
        return view('materiReading.edit', compact(
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
            // 'file' => 'nullable|file|mimes:png,jpeg|max:50004',
        // ], [
        //     'file.file' => 'File yang diunggah harus berupa file',
        //     'file.mimes' => 'File yang diunggah harus berupa JPEG atau PNG',
        //     'file.max' => 'Ukuran file maksimal 2 MB',
        // ]);
        ]);

        // if ($request->hasFile('file')) {
        //     // Hapus file lama
        //     Storage::delete('public/files/reading/' . $materi->file);

        //     // Upload file baru
        //     $file_path = $request->file('file')->store('public/files/grammar');

        //     $materi->update([
        //         'file' => str_replace('public/', '', $file_path), // Memastikan path file yang disimpan adalah yang benar
        //     ]);
        // }

        $materi->update([
            'title' => $request->title,
            'description' => $request->deskripsi,
        ]);

        return redirect()->route('materiReading.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy(string $code)
    {
        $materi = Materi::where('uuid', $code)->first();
    
        if (!$materi) {
            return redirect()->route('materiReading.index')->with(['error' => 'Data tidak ditemukan!']);
        }

        $materi->delete();
    
        return redirect()->route('materiReading.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    
}
