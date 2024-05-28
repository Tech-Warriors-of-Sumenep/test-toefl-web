<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ujian;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UjianGrammarController extends Controller
{
  private int $category = 2;

    public function index(): JsonResponse {
        $ujian = Ujian::with(['category','soal'])->where('category_id', $this->category)->get();
        return response()->json([
            "msg" => "Get Data Has Been Successfully",
            "payload" => $ujian
        ]);
    }
}
