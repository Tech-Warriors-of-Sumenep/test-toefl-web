<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ujian;
use Illuminate\Http\Request;

class GrammerController extends Controller
{
    private int $category = 1;
    //
        public function index()
    {
        $no = 1;
        $ujian = Ujian::with(['category'])->where('category_id', $this->category)->get();
        return view('grammer.index', compact([
            'ujian', 'no'
        ]));
    }

        public function create()
    {
        $categories = Category::all();
        return view('grammer.create', compact([
            'categories'
        ]));
    }

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

        return redirect()->route('ujian-grammar.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

        public function edit(string $code)
    {
        $categories = Category::all();
        $ujian = Ujian::with(['category'])->where('uuid', $code)->first();
        return view('grammer.edit', compact(
            [
                'categories', 'ujian'
            ]
        ));
    }

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

        return redirect()->route('ujian-grammar.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

        public function destroy(string $code)
    {
        $ujian = Ujian::with(['category'])->where('uuid', $code)->first();
        
        $ujian->delete();

        return redirect()->route('ujian-grammar.index')->with(['success' => 'Data Berhasil Didelete!']);
    }
}
