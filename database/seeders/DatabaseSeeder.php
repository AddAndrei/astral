<?php

namespace Database\Seeders;

use App\Models\MedicalHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patients;
use App\Models\Diagnoses;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Patients::factory(10)->create();
        Diagnoses::factory(20)->create();
        MedicalHistory::factory(25)->create();
    }
}
