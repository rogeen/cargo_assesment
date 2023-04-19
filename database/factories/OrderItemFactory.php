<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    public function definition(): array
    {
        return [
            'order_id'      => Order::factory(),
            'qty'           => $this->faker->numberBetween(1,100),
            'unit_price'   => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
