<?php

namespace Database\Factories;

use App\Models\Copy;
use Illuminate\Database\Eloquent\Factories\Factory;

class CopyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Copy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => $this->faker->randomElement(['new','used','under_repair','recycled','damaged']),
            'location' => 'Room ' . $this->faker->numberBetween(1, 20) . ' - Cabinet ' . $this->faker->randomElement(['A', 'B', 'C', 'D', 'E']) . ' - Shelf ' . $this->faker->numberBetween(1, 10), // Habitacion, armario y estante
            'bar_code' => $this->faker->unique()->ean13(),
            'identification_tag' => $this->faker->regexify('[A-Z]{3}[0-9]{4}'),
            'item_id'=> $this->faker->numberBetween(1,20)
        ];
    }
}
