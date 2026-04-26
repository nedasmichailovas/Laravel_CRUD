<?php
 
namespace Database\Factories;
 
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;
use App\Models\Group;
 
class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'     => $this->faker->firstName,
            'surname'  => $this->faker->lastName,
            'address'  => $this->faker->address,
            'phone'    => $this->faker->phoneNumber,
            'city_id'  => City::inRandomOrder()->first()->id ?? 1,
            'grupe_id' => Group::inRandomOrder()->first()->id ?? 1,
            'gim_data' => $this->faker
                              ->dateTimeBetween('-30 years', '-18 years')
                              ->format('Y-m-d'),
        ];
    }
}
