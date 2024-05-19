<?php

namespace App\Http\Controllers;

use App\Models\Soal; // Menggunakan model Soal yang telah dibuat
use App\Models\Ujian;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $soals = Soal::with('ujian')->get(); // Mengambil semua data soal dengan informasi ujian terkait
        return view('soal.index', compact('soals')); // Mengirim data soal ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ujians = Ujian::all(); // Mengambil semua data ujian
        return view('soal.create', compact('ujians')); // Mengirim data ujian ke view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ujian_id' => 'required',
            'soal' => 'required',
            'file' => 'required',
        ]);


        $file = $request->file('file');

        if($file != null) {
            $file->storeAs('file', $file->hashName());
            Soal::create([
                'ujian_id' => $request->ujian_id,
                'soal' => $request->soal,
                'file' => $file
            ]); // Menyimpan data soal baru ke database
        } else {
            Soal::create([
                'ujian_id' => $request->ujian_id,
                'soal' => $request->soal,
            ]);
        }

        return redirect()->route('soal.index')->with('success', 'Soal berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $soal = Soal::findOrFail($id); // Mencari data soal berdasarkan ID
        return view('soal.show', compact('soal')); // Mengirim data soal ke view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $soal = Soal::findOrFail($id); // Mencari data soal berdasarkan ID
        $ujians = Ujian::all(); // Mengambil semua data ujian
        return view('soal.edit', compact('soal', 'ujians')); // Mengirim data soal dan ujian ke view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ujian_id' => 'required',
            'soal' => 'required',
            'file' => 'required',
        ]);

        $soal = Soal::findOrFail($id); // Mencari data soal berdasarkan ID
        $soal->update($request->all()); // Mengupdate data soal

        return redirect()->route('soal.index')->with('success', 'Soal berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $soal = Soal::findOrFail($id); // Mencari data soal berdasarkan ID
        $soal->delete(); // Menghapus data soal

        return redirect()->route('soal.index')->with('success', 'Soal berhasil dihapus');
    }
}
