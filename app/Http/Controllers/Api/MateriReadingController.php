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
    public function show($filename)
    {
        $filePath = 'files/reading/' . $filename;

        if (Storage::disk('public')->exists($filePath)) {
            $file = Storage::disk('public')->get($filePath);
            $type = Storage::disk('public')->mimeType($filePath);

            return response($file, 200)->header('Content-Type', $type);
        } else {
            return response()->json(['error' => 'File not found.'], 404);
        }
    }
}
