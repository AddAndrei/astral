<?php

namespace App\Http\Controllers\Api;


use App\Services\DiagnoseService;
use Illuminate\Http\JsonResponse;

class DiagnosesController extends AbstractController
{

    public function __construct(DiagnoseService $diagnoseService)
    {
        $this->service = $diagnoseService;
    }

    public function index() : JsonResponse
    {
        $diagnoses = $this->service->all();
        return response()->json($diagnoses, 200);
    }

}
