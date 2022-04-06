<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DiagnosesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $code = $this->faker->regexify('[A-Z]{1}') . $this->faker->regexify('[0-9]{2}') . "." .$this->faker->regexify('[0-9]{1}');
        return [
            //
            'diagnose'  => $this->faker->sentence(2, true),
            'code'      => $code
        ];
    }
}























