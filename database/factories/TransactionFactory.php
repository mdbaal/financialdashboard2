<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
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
            'name' => 'Test Transaction',
            'description' => fake()->sentence(),
            'amount' => fake()->randomFloat(2, -100, 100),
            'account_id' => Account::all()->first() ?? Account::factory(),
            'date' => Carbon::now(),
            'category_id' => Category::factory(),
        ];
    }
}
