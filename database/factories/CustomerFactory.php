<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname'   => $this->faker->name,
            'phone'      => $this->faker->phoneNumber,
            'city_id'    => City::factory(),
        ];
    }
}
