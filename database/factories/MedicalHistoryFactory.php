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
        $diagnose = $this->faker->boolean;
        return [
            //
            'patient_id'    => Patients::all()->random()->id, //только в рамках тестового задания
            'diagnose_id'   => ($diagnose) ? Diagnoses::all()->random()->id : null,
            'open_date'     => $this->faker->dateTimeBetween('-24 months', 'now'),
            'close_date'    => $this->faker->dateTimeBetween('-24 months', 'now')
        ];
    }
}
