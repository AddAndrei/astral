<?php

namespace App\Services;

use App\Interfaces\IServices;
use App\Models\Patients;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PatientsService extends Service implements IServices
{
    public function __construct()
    {
        $this->fields = [
            'id', DB::raw("CONCAT(last_name, ' ',first_name, ' ', second_name) as fio"),
            'gender', 'birth_date', 'die_date'
        ];
    }

    public function all() : Collection
    {
        return Patients::all($this->fields);
    }
}
