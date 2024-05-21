<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use Illuminate\Http\Request;

class SoalListeningController extends Controller
{
    private int $category = 3;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $no = 1;
        $soal = Soal::with(['jawaban', 'ujian'])->get();
        
        return view('soal-listening.index', compact([
            'soal', 'no'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $ujian)
    {
        return view('soal-listening.create', compact([
            'ujian'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ujian' => 'required',
            'soal' => 'required',
            'file' => 'required',
        ]);


        $file = $request->file('file');
        $file->storeAs('public/file', $file->hashName());

        Soal::create([
            'ujian_id' => $request->ujian,
            'soal' => $request->soal,
            'file' => $file->hashName()
        ]); // Menyimpan data soal baru ke database

        return redirect()->route('soal-listening.index')->with('success', 'Soal berhasil disimpan');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
