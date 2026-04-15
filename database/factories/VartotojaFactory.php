<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VartotojaFactory extends Factory
{
    protected $model = \App\Models\Vartotoja::class;

    public function definition()
    {
        return [
            'vardas'    => $this->faker->firstName(),
            'pavarde'   => $this->faker->lastName(),
            'telefonas' => $this->faker->phoneNumber(),
            'gim_data'  => $this->faker->date('Y-m-d'),
        ];
    }
}