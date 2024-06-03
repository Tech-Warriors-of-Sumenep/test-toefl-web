<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ujian;
use App\Models\Soal;
use Illuminate\Support\Facades\Storage;

class SoalGrammarController extends Controller
{
    private int $category = 1;
    public function index()
    {
        $no = 1;
        $ujian = Ujian::with(['category'])
            ->where('category_id', $this->category)
            ->get(); // Mengambil semua ujian
        return view('soal-grammar.index', compact(['ujian', 'no'])); // Mengirim data ujian ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $ujian)
    {
        return view('soal-grammar.create', compact(['ujian'])); // Mengirim data ujian ke view
    }

    public function detail_soal(string $ujian)
    {
        $soals = Soal::with(['ujian'])->where('ujian_id', $ujian)->get();
        return view('soal-grammar.detail-soal', compact(['soals'])); // Mengirim data ujian ke view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $this->validate($request, [
            'ujian' => 'required',
            'soal' => 'required',
            'file' => 'nullable', // Validate audio file
        ]);

        // Handle file upload
        $file = $request->file('file');

        if ($file != null) {
            // Store the file in the 'public/file' directory
            $file->storeAs('public/file', $file->hashName());

            // Create a new record in the Soal table
            Soal::create([
                'ujian_id' => $request->ujian,
                'soal' => $request->soal,
                'file' => $file->hashName(), // Save the filename in the database
            ]);
        } else {
            // Create a new record without a file
            Soal::create([
                'ujian_id' => $request->ujian,
                'soal' => $request->soal,
            ]);
        }

        // Redirect back to the index route with a success message
        return redirect()->route('soal-grammar.index')->with('success', 'Soal berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($code)
    {
        $no = 0;
        $soal = Soal::with(['jawaban','kunciJawaban','kunciJawaban.jawaban'])->find($code); // Mencari data soal berdasarkan ID
        $option = ['A','B','C','D'];
        return view('jawaban.detail-soal', compact(['soal', 'option', 'no'])); // Mengirim data soal ke view
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $soal = Soal::findOrFail($id); // Mencari data soal berdasarkan ID
        $ujians = Ujian::all(); // Mengambil semua data ujian
        return view('soal-grammar.edit', compact('soal', 'ujians')); // Mengirim data soal dan ujian ke view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ujian_id' => 'required',
            'soal' => 'required',
        ]);

        $soal = Soal::findOrFail($id);

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
                    'ujian_id' => $request->ujian,
                    'soal' => $request->soal,
                ]);
            }
        } else {
            $soal->update([
                'ujian_id' => $request->ujian,
                'soal' => $request->soal,
            ]);
        }

        return redirect()->route('soal-grammar.index')->with('success', 'Soal berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $soal = Soal::findOrFail($id);

        if ($soal->file) {
            //delete old file
            Storage::delete('public/file/' . $soal->file);
        }
        $soal->delete();

        return redirect()->route('soal-grammar.index')->with('success', 'Soal berhasil dihapus');
    }
}
