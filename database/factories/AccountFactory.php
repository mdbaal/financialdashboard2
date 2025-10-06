<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_name' => fake()->unique()->name(),
            'account_number' => 'NL00RABO' . fake()->unique()->numberBetween(0,100),
            'balance' => fake()->randomFloat(2,-500,500),
            'currency' => '€',
            'user_id' => 1
        ];
    }
}
