<?php

namespace Database\Factories;

use App\Models\Diagnoses;
use App\Models\Patients;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalHistory>
 */
class MedicalHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'patient_id'    => Patients::all()->random()->id, //только в рамках тестового задания
            'diagnose_id'   => Diagnoses::all()->random()->id,
            'open_date'     => $this->faker->dateTimeBetween('-24 months', 'now'),
            'close_date'    => $this->faker->dateTimeBetween('-24 months', 'now')
        ];
    }
}
