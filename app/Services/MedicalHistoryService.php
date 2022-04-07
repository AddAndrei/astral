<?php

namespace App\Services;

use App\Interfaces\IServices;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MedicalHistoryService extends Service implements IServices
{
    public function __construct()
    {
        $this->fields = [
            'medical_histories.id', 'patients.uuid',
            DB::raw("CONCAT(patients.last_name, ' ', SUBSTRING(patients.first_name, 1, 1),'.', SUBSTRING(patients.second_name,1,1),'.') as patient"),
            DB::raw("CONCAT(diagnoses.code, ' ', diagnoses.diagnose) as diagnose"),
            'open_date', 'close_date', 'medical_histories.diagnose_id'
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

    public function create(Request $request) : bool
    {
        $valid = $request->validate([
            'patient_id'       => 'required|int',
            'open_date'     => 'required|date',
        ]);
        if($valid) {
            return DB::table('medical_histories')->insert($valid);
        }
        return false;
    }

    public function getByField($field, $value): Collection
    {
        return DB::table('medical_histories')
            ->select($this->fields)
            ->join('patients', 'medical_histories.patient_id', '=', 'patients.id', 'left')
            ->join('diagnoses', 'medical_histories.diagnose_id', '=', 'diagnoses.id', 'left')
            ->where($field, $value)->get();

    }

    public function delete($data) : bool
    {
        return DB::table('medical_histories')->where($data)->delete();
    }

    public function update($id, $data) : bool
    {
        return DB::table('medical_histories')->where('id', $id)->update($data);
    }
}





















