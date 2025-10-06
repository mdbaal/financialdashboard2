<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => "Test uitgave",
            'description' => fake()->sentence(),
            'amount' => fake()->randomFloat(2,-100,100),
            'currency' => '€',
            'account_id' => 1,
        ];
    }
}
