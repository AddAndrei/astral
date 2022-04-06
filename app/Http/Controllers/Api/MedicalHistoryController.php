<?php

namespace App\Http\Controllers\Api;

use App\Services\MedicalHistoryService;
use Illuminate\Http\JsonResponse;

class MedicalHistoryController extends AbstractController
{

    public function __construct(MedicalHistoryService $medicalHistoryService)
    {
        $this->service = $medicalHistoryService;
    }

    public function index():JsonResponse
    {
        $medicalHistory = $this->service->all();
        return response()->json($medicalHistory, 200);
    }

}
