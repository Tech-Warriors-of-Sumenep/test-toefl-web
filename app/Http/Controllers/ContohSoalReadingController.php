<?php

namespace App\Http\Controllers;

use App\Models\ContohSoal;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContohSoalReadingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private int $category = 2;
    public function index()
    {
        $no = 1;
        $materi = Materi::with(['category'])
            ->where('category_id', $this->category)
            ->get(); // Mengambil semua materi
        return view('contohSoalReading.index', compact(['materi', 'no']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($materi)
    {
        return view('contohSoalReading.create', compact(['materi']));
    }

    public function detail_soal(string $materi)
    {
        $contohsoals = ContohSoal::with(['materi'])->where('materi_id', $materi)->get();
        return view('contohSoalReading.detail-soal', compact(['contohsoals'])); // Mengirim data materi ke view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $this->validate($request, [
            'materi' => 'required',
            'soal' => 'required',
            'file' => 'nullable', // Validate audio file
        ]);

        // Handle file upload
        $file = $request->file('file');

        if ($file != null) {
            // Store the file in the 'public/file' directory
            $file->storeAs('public/file', $file->hashName());

            // Create a new record in the Soal table
            ContohSoal::create([
                'materi_id' => $request->materi,
                'soal' => $request->soal,
                'file' => $file->hashName(), // Save the filename in the database
            ]);
        } else {
            // Create a new record without a file
            ContohSoal::create([
                'materi_id' => $request->materi,
                'soal' => $request->soal,
            ]);
        }

        // Redirect back to the index route with a success message
        return redirect()->route('contohsoal-reading.index')->with('success', 'Soal berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $code)
    {
        $no = 0;
        $soal = ContohSoal::with(['contohjawaban'])->find($code); // Mencari data soal berdasarkan ID
        $option = ['A', 'B', 'C', 'D'];
        return view('contohJawabanReading.detail-soal', compact(['soal', 'option', 'no']));
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
        $this->validate($request, [
            'materi_id' => 'required',
            'soal' => 'required',
        ]);

        $soal = ContohSoal::findOrFail($id);

        if ($soal->file) {
            if ($request->hasFile('file')) {
                //upload new file
                $file = $request->file('file');
                $file->storeAs('public/file', $file->hashName());

                //delete old file
                Storage::delete('public/file/' . $soal->file);

                //update post with new file
                $soal->update([
                    'file' => $file->hashName(),
                    'materi_id' => $request->materi,
                    'soal' => $request->soal,
                ]);
            }
        } else {
            $soal->update([
                'materi_id' => $request->materi,
                'soal' => $request->soal,
            ]);
        }

        return redirect()->route('contohsoal-reading.index')->with('success', 'Soal berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $soal = ContohSoal::findOrFail($id);

        if ($soal->file) {
            //delete old file
            Storage::delete('public/file/' . $soal->file);
        }
        $soal->delete();

        return redirect()->route('contohsoal-reading.index')->with('success', 'Soal berhasil dihapus');
    }
}
