<?php

namespace App\Http\Controllers\Api;


use App\Interfaces\IServices;
use App\Services\PatientsService;
use Illuminate\Http\JsonResponse;


class PatientsController extends AbstractController
{

    public function __construct(PatientsService $patientsService)
    {
        $this->service = $patientsService;
    }

    public function index(): JsonResponse
    {
        $patients = $this->service->all();
        return response()->json($patients, 200);
    }




}
