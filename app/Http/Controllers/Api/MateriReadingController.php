<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class materiReadingController extends Controller
{
    public function index(): JsonResponse {
        $materi = Materi::where('category_id', 2)->get()->toArray();
        return response()->json([
            'msg' => 'Get Data Has Been Successfully',
            'payload' => $materi
        ]);
    }
}
