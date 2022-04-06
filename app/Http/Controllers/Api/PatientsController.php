<?php

namespace App\Http\Controllers\Api;


use App\Interfaces\IServices;
use App\Services\PatientsService;
use Illuminate\Http\JsonResponse;


class PatientsController extends AbstractController
{
    private IServices $services;

    public function __construct(PatientsService $patientsService)
    {
        $this->services = $patientsService;
    }

    public function index(): JsonResponse
    {
        $patients = $this->services->all();
        return response()->json($patients, 200);
    }




}
