<?php

use App\Models\Account;
use App\Models\User;

beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

test('Authenticated user can access the account page', function () {
    $page = visit('/dashboard/accounts');

    $page->assertSee('Accounts');
});

test('Authenticated user can create new account ', function () {
    $page = visit('/dashboard/accounts');

    $page->click('Create new')
        ->assertSee('Create account')
        ->fill('account_name', 'Test Account')
        ->fill('account_number', '1234567890')
        ->select('currency', 'EUR')
        ->press('Create');

    $account = Account::find(1);

    expect($account->account_name)->toBe('Test Account')
        ->and($account->account_number)->toBe('1234567890')
        ->and($account->currency)->toBe('EUR');
});

test('Authenticated user can access an account', function () {
    $account = Account::factory()->create();
    $page = visit('/dashboard/accounts');

    $page->click($account->account_name)
        ->assertSee($account->account_name.' '.$account->currency.$account->balance);
});

test('Authenticated user can edit an account', function () {
    $account = Account::factory()->create();
    $page = visit('/dashboard/accounts/1');

    $page->click('Edit')
        ->assertSee('Edit account')
        ->fill('account_name', 'Changed Test Account')
        ->fill('account_number', 'NL00RABO123456789')
        ->select('currency', 'USD')
        ->click('Save');

    $account->refresh();

    expect($account->account_name)->toBe('Changed Test Account')
        ->and($account->account_number)->toBe('NL00RABO123456789')
        ->and($account->currency)->toBe('USD');
});

test('Authenticated user can delete an account', function () {
    $account = Account::factory()->create();
    $page = visit('/dashboard/accounts');

    $page->click('.lucide-delete-icon');

    expect(Account::find($account->id))->toBeNull();
});
