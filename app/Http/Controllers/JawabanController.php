<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Soal;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $soal)
    {
        return view('jawaban.create', compact(['soal']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $this->validate($request, [
            'jawaban' => 'required',
            'soal' => 'required',
        ]);

        $jawaban = $request->jawaban;

        for($i = 0; $i < count($jawaban); $i++) {
            Jawaban::create([
                "soal_id" => $request->soal,
                "name" => $jawaban[$i]
            ]);
        }

        return redirect()->route('dashboard')->with('success', 'Soal berhasil disimpan');
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
