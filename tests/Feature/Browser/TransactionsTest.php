<?php

use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;

beforeEach(function () {
    $this->actingAs(User::factory()->create());
    Account::factory()->create();
});

test('Authenticated user can view transactions on an account', function () {
    Transaction::factory()->create(['name' => 'test transaction']);
    $page = visit('/dashboard/accounts/1');

    $page->assertSee('test transaction');
});

test('Authenticated user can create transactions on an account', function () {
    $page = visit('/dashboard/accounts/1');
    $account = Account::find(1);
    $date = Carbon::create(2025, 10, 2)->format('Y-m-d H:i:s');
    $category = Category::factory()->create(['name' => 'Any']);

    $page->assertSee($account->account_name)
        ->click('Create transaction')
        ->fill('name', 'Test Transaction')
        ->fill('description', 'Test description')
        ->fill('amount', '10.00')
        ->fill('custom_id', 'test-01')
        ->click('date')->click('2')->click('Select')
        ->fill('custom_id', 'test-01')
        ->select('category_id', 'Any')
        ->click('Save');

    $account->refresh();
    $transaction = $account->transactions->first();

    expect($transaction->name)->toBe('Test Transaction')
        ->and($transaction->description)->toBe('Test description')
        ->and($transaction->amount)->toBe(10)
        ->and($transaction->custom_id)->toBe('test-01')
        ->and($transaction->date)->toBe($date)
        ->and($transaction->category->name)->toBe($category->name);
});

test('Authenticated user can edit transaction', function () {
    $transaction = Transaction::factory()->create();
    $date = Carbon::create(2025, 10, 2)->format('Y-m-d H:i:s');
    $amount = $transaction->amount;
    $category = Category::factory()->create(['name' => 'Any']);

    $page = visit('/dashboard/accounts/1');

    $page->click($transaction->name)
        ->assertSee('Edit '.$transaction->name)
        ->fill('name', 'Test Transaction')
        ->clear('description')
        ->fill('description', 'Test description')
        ->fill('amount', '10.00')
        ->fill('custom_id', 'test-02')
        ->click('date')->click('2')->click('Select')
        ->select('category_id', 'Any')
        ->click('Save');

    $transaction->refresh();

    expect($transaction->name)->toBe('Test Transaction')
        ->and($transaction->description)->toBe('Test description')
        ->and($transaction->amount)->not->ToBe($amount)
        ->and($transaction->custom_id)->toBe('test-02')
        ->and($transaction->date)->toBe($date)
        ->and($transaction->category->name)->toBe($category->name);
});

test('Authenticated user can delete a transaction', function () {
    $transaction = Transaction::factory()->create();

    $page = visit('/dashboard/accounts/1');

    $page->click('.lucide-delete-icon');

    expect(Transaction::find($transaction->id))->toBeNull();
});
