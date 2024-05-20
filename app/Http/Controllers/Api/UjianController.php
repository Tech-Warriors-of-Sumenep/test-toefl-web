<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ujian;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UjianController extends Controller
{
    public function index(): JsonResponse {
        $ujian = Ujian::with(['category'])->get();
        return response()->json([
            "msg" => "Get Data Has Been Successfully",
            "payload" => $ujian
        ]);
    }
}
