<?php

namespace App\Http\Controllers\Api;

use App\Services\MedicalHistoryService;
use Illuminate\Http\Request;
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

    public function create(Request $request) : JsonResponse
    {
        $success = $this->service->create($request);
        return response()->json($success, 200);
    }

    public function illness($id): JsonResponse
    {
        $illness = $this->service->getByField('medical_histories.id', $id);
        return $this->response($illness, ['message'=>'Illness not found']);

    }

    public function delete(Request $request) : JsonResponse
    {
        $success = $this->service->delete($request->all());
        return $this->response($success, ['message'=>'Illness not found']);
    }

    public function edit(Request $request) : JsonResponse
    {
        $success = $this->service->update($request->post('id'), $request->all());
        return $this->response($success, ['message' => 'not updated (']);
    }
}
