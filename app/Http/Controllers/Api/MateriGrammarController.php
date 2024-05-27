<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Materi;
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

    /**
     * Menyimpan resource yang baru dibuat.
     */
   

    /**
     * Menampilkan resource yang ditentukan.
     */
   
}
