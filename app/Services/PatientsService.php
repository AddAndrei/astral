<?php

namespace App\Services;

use App\Interfaces\IServices;
use App\Models\Patients;
use Illuminate\Support\Collection;

class PatientsService extends Service implements IServices
{

    public function all() : Collection
    {
        return Patients::all();
    }
}
