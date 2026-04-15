<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'      => $this->faker->firstName(),
            'surname'   => $this->faker->lastName(),
            'birthday'  => $this->faker->date('Y-m-d', '-18 years'),
            'phone'     => $this->faker->phoneNumber(),
            'address'   => $this->faker->address(),
            'city_id'   => City::inRandomOrder()->first()->id ?? 1,
        ];
    }
}