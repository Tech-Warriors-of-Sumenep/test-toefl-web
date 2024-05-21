<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;

class MateriListeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $materi = Materi::with(['category'])->where('category_id', 3)->get();
        return response()->json([
            "msg" => "Data berhasil diambil",
            'payload' => $materi
        ]);
    }
}
