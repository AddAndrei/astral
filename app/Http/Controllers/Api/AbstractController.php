<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\IServices;
use Illuminate\Http\JsonResponse;

class AbstractController extends Controller
{
    protected IServices $service;

    protected function response($success, $message) : JsonResponse
    {
        if(is_null($success)){
            return response()->json($message, 404);
        }
        return response()->json($success, 200);
    }
}
