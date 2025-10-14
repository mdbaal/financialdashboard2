<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Account>
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
            'account_number' => 'NL00RABO'.fake()->unique()->numberBetween(0, 100),
            'balance' => 0,
            'currency' => 'EUR',
            'currency_character' => '€',
            'user_id' => 1,
        ];
    }
}
