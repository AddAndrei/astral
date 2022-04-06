<?php

namespace App\Services;

use App\Interfaces\IServices;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MedicalHistoryService extends Service implements IServices
{
    public function __construct()
    {
        $this->fields = [
            'medical_histories.id', 'patients.uuid','patients.last_name',
            DB::raw("CONCAT(SUBSTRING(patients.first_name, 1, 1),'.', SUBSTRING(patients.second_name,1,1),'.') as initials"),
            'diagnoses.code', 'diagnoses.diagnose', 'open_date', 'close_date'
        ];
    }

    public function all() : Collection
    {
        return DB::table('medical_histories')
            ->select($this->fields)
            ->join('patients', 'medical_histories.patient_id', '=', 'patients.id', 'left')
            ->join('diagnoses', 'medical_histories.diagnose_id', '=', 'diagnoses.id', 'left')
            ->get();
    }


}
