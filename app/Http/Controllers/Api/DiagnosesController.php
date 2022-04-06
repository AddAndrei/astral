<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\IServices;
use App\Services\DiagnoseService;
use Illuminate\Http\JsonResponse;

class DiagnosesController extends AbstractController
{
    private IServices $services;
    public function __construct(DiagnoseService $diagnoseService)
    {
        $this->services = $diagnoseService;
    }

    public function index() : JsonResponse
    {
        $diagnoses = $this->services->all();
        return response()->json($diagnoses, 200);
    }

}
