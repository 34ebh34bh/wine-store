<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ShopVin;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShopVin>
 */
class ShopVinFactory extends Factory
{
    protected $model = ShopVin::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 10, 500),
            'year' => $this->faker->year(),
            'volume' => $this->faker->randomElement([375, 500, 750, 1000]),
            'image' => $this->faker->imageUrl(640, 480, 'wine'),
            'color' => $this->faker->randomElement(['красное', 'белое', 'розовое']),
            'Fortress' => $this->faker->randomElement(['сухое', 'полусладкое', 'сладкое']),
            'Region' => $this->faker->country(),
            'Availability' => $this->faker->boolean(),
        ];
    }
}
