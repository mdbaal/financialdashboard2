<?php

namespace App\Http\Controllers;

use App\Enums\CurrencyTypes;
use App\Http\Requests\StoreAccountRequest;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
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
                'transactions' => $transactions,
                'currencyOptions' => CurrencyTypes::getCurrencyOptions(),
            ]);
    }

    public function store(StoreAccountRequest $request)
    {
        $validated = $request->validated();
        $validated['balance'] = 0;
        $validated['user_id'] = Auth::id();

        Account::create($validated);

        return redirect(route('accounts'));
    }

    public function update(int $id, Request $request)
    {
        $account = Account::findOrFail($id);

        $validated = $request->validate([
            'account_name' => [
                'required',
                'regex:/^[a-zA-Z0-9\s]+$/',
                'string',
                'max:50',
                Rule::unique('App\Models\Account')->ignore($account->id)],
            'account_number' => [
                'required',
                'alpha_num',
                'max:50',
                Rule::unique('App\Models\Account')->ignore($account->id)],
            'currency' => ['required', Rule::in(CurrencyTypes::getCurrencyOptions('value'))],
        ]);

        $account->account_name = $validated['account_name'];
        $account->account_number = $validated['account_number'];
        $account->currency = $validated['currency'];

        if ($account->isDirty()) {
            $account->save();
        }

        redirect(route('accounts.show', $account));
    }

    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:App\Models\Account,id',
        ]);

        Account::find($validated['id'])->delete();

        return redirect(route('accounts'));
    }
}
