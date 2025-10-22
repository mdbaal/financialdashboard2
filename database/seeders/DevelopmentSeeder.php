<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create(
            [
                'email' => 'mirco@mirco.com',
                'password' => '123456789',
            ]
        );

        $categories = Category::all();

        if ($categories->isEmpty()) {
            $categories = Category::factory(5)->create();
        }

        Account::factory(2)
            ->has(Transaction::factory()
                ->count(10)
                ->state(['category_id' => $categories->random()->id])
            )
            ->create(['user_id' => $user->id]);
    }
}
