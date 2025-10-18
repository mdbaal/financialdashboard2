<?php

namespace App\Http\Controllers;

use App\Enums\CurrencyTypes;
use App\Http\Requests\Account\DestroyAccountRequest;
use App\Http\Requests\Account\StoreAccountRequest;
use App\Http\Requests\Account\UpdateAccountRequest;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Auth::user()->accounts;
        $currencyOptions = CurrencyTypes::getCurrencyOptions();

        return Inertia::render('account/Accounts',
            [
                'userAccounts' => $accounts,
                'currencyOptions' => $currencyOptions,
            ]);
    }

    public function show(Account $account)
    {
        $transactions = $account->transactions;

        return Inertia::render('account/Show',
            [
                'accountViewed' => $account,
                'transactions' => $transactions->load('category'),
                'currencyOptions' => CurrencyTypes::getCurrencyOptions(),
                'categories' => Auth::user()->categories,
            ]);
    }

    public function store(StoreAccountRequest $request)
    {
        $validated = $request->validated();
        $validated['balance'] = 0;
        $validated['currency_character'] = CurrencyTypes::getCurrencyValue($validated['currency']);
        $validated['user_id'] = Auth::id();

        Account::create($validated);

        return redirect(route('accounts'))
            ->with('success', ['message' => 'Account created successfully.', 'duration' => 5000]);
    }

    public function update(UpdateAccountRequest $request, int $id)
    {
        $account = Account::findOrFail($id);

        $validated = $request->validated();

        $account->account_name = $validated['account_name'];
        $account->account_number = $validated['account_number'];
        $account->currency = $validated['currency'];
        $account->currency_character = CurrencyTypes::getCurrencyValue($validated['currency']);

        if ($account->isDirty()) {
            $account->save();
        }

        redirect(route('accounts.show', $account))
            ->with('success', ['message' => 'Account updated successfully.', 'duration' => 5000]);

    }

    public function destroy(DestroyAccountRequest $request)
    {
        $validated = $request->validated();

        Account::find($validated['id'])->delete();

        return redirect(route('accounts'))
            ->with('success', ['message' => 'Account deleted successfully.', 'duration' => 5000]);

    }
}
