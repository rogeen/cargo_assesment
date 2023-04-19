<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Order::class;
    private static $number = 0;

    public function definition(): array
    {
        self::$number++;
        return [
            'customer_id'    => Customer::factory(),
            'order_number'   => self::$number,
            'order_uuid'     => $this->faker->uuid,
            'total'          => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
