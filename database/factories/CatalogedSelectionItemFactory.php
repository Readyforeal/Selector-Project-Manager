<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CatalogedSelectionItem>
 */
class CatalogedSelectionItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'team_id' => 1,
            'name' => fake()->name(),
            'notes' => fake()->sentence(),
            'item_number' => fake()->word(),
            'supplier' => fake()->word(),
            'link' => fake()->url(),
            'quantity' => random_int(1, 10),
            'dimensions' => random_int(1, 100) . 'ft ' . random_int(1, 11) . 'in',
            'finish' => fake()->word(),
            'color' => fake()->colorName(),
        ];
    }
}
