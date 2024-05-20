<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use Illuminate\Http\Request;

class UjianListeningController extends Controller
{
    private int $category = 3;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $no = 1;
        $ujian = Ujian::with(['category'])
            ->where('category_id', $this->category)
            ->get();
        return view('ujian-listening.index', compact(['ujian', 'no']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ujian-listening.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => 'required|min:8',
                'deskripsi' => 'required|min:8',
            ],
            [
                'title.required' => 'title harus terisi',
                'title.min' => 'panjang title minimal 8 karakter',
                'deskripsi.required' => 'deskripsi harus terisi',
                'deskripsi.min' => 'panjang deskripsi minimal 8 karakter',
            ],
        );

        Ujian::create([
            'uuid' => uniqid(),
            'title' => $request->title,
            'description' => $request->deskripsi,
            'category_id' => $this->category,
        ]);

        return redirect()
            ->route('ujian-listening.index')
            ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $code)
    {
        $ujian = Ujian::with(['category'])
            ->where('uuid', $code)
            ->first();
        return view('ujian-listening.edit', compact(['ujian']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $code)
    {
        $ujian = Ujian::with(['category'])
            ->where('uuid', $code)
            ->first();

        $this->validate(
            $request,
            [
                'title' => 'required|min:8',
                'deskripsi' => 'required|min:8',
            ],
            [
                'title.required' => 'title harus terisi',
                'title.min' => 'panjang title minimal 8 karakter',
                'deskripsi.required' => 'deskripsi harus terisi',
                'deskripsi.min' => 'panjang deskripsi minimal 8 karakter',
            ],
        );

        $ujian->update([
            'title' => $request->title,
            'description' => $request->deskripsi,
        ]);

        return redirect()
            ->route('ujian-listening.index')
            ->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $code)
    {
        $ujian = Ujian::with(['category'])
            ->where('uuid', $code)
            ->first();

        $ujian->delete();

        return redirect()
            ->route('ujian-listening.index')
            ->with(['success' => 'Data Berhasil Didelete!']);
    }
}
