<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Ecommerce\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'description' => $this->faker->text,
            'price' => $this->faker->randomNumber(4),
            'live_at' => now(),
        ];
    }

    public function unlive(): static
    {
        return $this->state(fn (array $attributes) => [
            'live_at' => null,
        ]);
    }
}
