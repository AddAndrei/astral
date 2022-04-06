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
        $live  = $this->faker->boolean();
        return [
            //
            'uuid'          => $this->faker->uuid(),
            'first_name'    => $this->faker->firstName('male'|'female'),
            'second_name'   => $this->faker->firstName('male'|'female'),
            'last_name'     => $this->faker->lastName(),
            'gender'        => $this->faker->boolean(),
            'birth_date'    => $this->faker->dateTimeBetween('-30 years', '-10 years'),
            'die_date'      => ($live) ? null : $this->faker->dateTimeBetween('-25 years', 'now'),
        ];
    }
}
