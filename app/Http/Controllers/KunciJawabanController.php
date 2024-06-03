<?php

namespace App\Http\Controllers;

use App\Models\KunciJawaban;
use App\Models\Soal;
use Illuminate\Http\Request;

class KunciJawabanController extends Controller
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
    public function create(string $id)
    {
        $soal = Soal::with(['jawaban'])->find($id);
        $option = ['A', 'B', 'C', 'D'];
        $no = 0;
        return view('kunci-jawaban.create', compact(['soal', 'option', 'no']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        // $this->validate($request, [
        //     'jawaban_id' => 'required',
        // ]);

        KunciJawaban::create([
            'soal_id' => $request->soal_id,
            'jawaban_id' => $request->jawaban_id,
        ]);

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
