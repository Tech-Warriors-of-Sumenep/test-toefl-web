<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ujian;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ujian = Ujian::with(['category'])->get();
        $no = 1;
        return view('ujian.index', compact([
            'ujian', 'no'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('ujian.create', compact([
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
            'category' => 'required',
            'deskripsi' => 'required|min:8'
        ], [
            'title.required' => 'title harus terisi',
            'title.min' => 'panjang title minimal 8 karakter',
            'category.required' => 'kategori harus terisi',
            'deskripsi.required' => 'deskripsi harus terisi',
            'deskripsi.min' => 'panjang deskripsi minimal 8 karakter'
        ]);

        Ujian::create([
            'uuid' => uniqid(),
            'title' => $request->title,
            'description' => $request->deskripsi,
            'category_id' => $request->category
        ]);

        return redirect()->route('ujian.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $categories = Category::all();
        $ujian = Ujian::with(['category'])->where('uuid', $code)->first();
        return view('ujian.edit', compact(
            [
                'categories', 'ujian'
            ]
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $code)
    {
        $ujian = Ujian::with(['category'])->where('uuid', $code)->first();

        $this->validate($request, [
            'title' => 'required|min:8',
            'category' => 'required',
            'deskripsi' => 'required|min:8'
        ], [
            'title.required' => 'title harus terisi',
            'title.min' => 'panjang title minimal 8 karakter',
            'category.required' => 'kategori harus terisi',
            'deskripsi.required' => 'deskripsi harus terisi',
            'deskripsi.min' => 'panjang deskripsi minimal 8 karakter'
        ]);

        $ujian->update([
            'title' => $request->title,
            'description' => $request->deskripsi,
            'category_id' => $request->category
        ]);

        return redirect()->route('ujian.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $code)
    {
        $ujian = Ujian::with(['category'])->where('uuid', $code)->first();
        
        $ujian->delete();

        return redirect()->route('ujian.index')->with(['success' => 'Data Berhasil Didelete!']);
    }
}
