<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patients>
 */
class PatientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = $this->faker->boolean();
        $live  = $this->faker->boolean();
        $fio = $this->faker->firstName('male'|'female') ." ". $this->faker->lastName('male'|'female');
        return [
            //
            'id'        => $this->faker->uuid(),
            'fio'       => $fio,
            'gender'    => $gender,
            'birth_date'=> $this->faker->dateTimeBetween('-30 years', '-10 years'),
            'die_date'  => ($live) ? null : $this->faker->dateTimeBetween('-25 years', 'now'),
        ];
    }
}
