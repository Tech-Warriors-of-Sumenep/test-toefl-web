<?php

namespace App\Http\Controllers;

use App\Models\JawabanContohSoals;
use App\Models\ContohSoal;
use Illuminate\Http\Request;

class ContohJawabanController extends Controller
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
    public function create(string $contohsoal)
    {
        return view('contohjawaban.create', compact(['contohsoal']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $this->validate($request, [
            'jawabancontohsoal' => 'required',
            'soal' => 'required',
        ]);

        $jawabancontohsoal = $request->jawabancontohsoal;

        for($i = 0; $i < count($jawabancontohsoal); $i++) {
            JawabanContohSoals::create([
                "contoh_soal_id" => $request->soal,
                "name" => $jawabancontohsoal[$i]
            ]);
        }

        return redirect()->route('dashboard')->with('success', 'contoh Soal berhasil disimpan');
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
