<?php

namespace App\Services;

use App\Interfaces\IServices;
use App\Models\Diagnoses;
use Illuminate\Support\Collection;

class DiagnoseService extends Service implements IServices
{
    public function all(): Collection
    {
        return Diagnoses::all();
    }
}
