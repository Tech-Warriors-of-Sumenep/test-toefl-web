<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Materi;
use App\Models\FlipMateri;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MateriGrammarController extends Controller
{
    /**
     * Menampilkan daftar resource.
     */
    public function index(): JsonResponse
    {
        $materi = Materi::with(['category'])-> where('category_id', 1) -> get();
        return response()->json([
            "msg" => "Data berhasil diambil",
            "payload" => $materi
        ]);
    }

    public function indexFlipMateri(): JsonResponse
{
    $flipMateri = FlipMateri::with(['materi'])->get();
    return response()->json([
        "msg" => "Data Flip Materi berhasil diambil",
        "payload" => $flipMateri
    ]);
}

    public function show($filename)
    {
        $filePath = 'files/grammar/' . $filename;

        if (Storage::disk('public')->exists($filePath)) {
            $file = Storage::disk('public')->get($filePath);
            $type = Storage::disk('public')->mimeType($filePath);

            return response($file, 200)->header('Content-Type', $type);
        } else {
            return response()->json(['error' => 'File not found.'], 404);
        }
    }

    public function showw($filename)
    {
        $filePath = 'files/flipMateri/' . $filename;

        if (Storage::disk('public')->exists($filePath)) {
            $file = Storage::disk('public')->get($filePath);
            $type = Storage::disk('public')->mimeType($filePath);

            return response($file, 200)->header('Content-Type', $type);
        } else {
            return response()->json(['error' => 'File not found.'], 404);
        }
    }
    /**
     * Menyimpan resource yang baru dibuat.
     */


    /**
     * Menampilkan resource yang ditentukan.
     */

}
