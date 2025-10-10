<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TransactionController extends Controller
{
    public function store(Request $request, int $account_id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'description' => [Rule::excludeIf(empty($request['description'])), 'string', 'max:500'],
            'amount' => ['required', 'decimal:0,2'],
            'custom_id' => [
                Rule::excludeIf(empty($request['custom_id'])),
                'min:3',
                'max:255',
                'string',
                Rule::unique('App\Models\Transaction', 'custom_id')],
            'date' => ['required'],
            'account_id' => 'required|exists:App\Models\Account,id',
        ]);

        $account = Account::find($validated['account_id']);

        $validated['currency'] = $account->currency;
        $validated['account_id'] = $account->id;

        Transaction::create($validated);

        $account->updateBalance();

        return redirect(route('accounts.show', $account));
    }

    public function update(int $transactionId, Request $request)
    {
        $transaction = Transaction::findOrFail($transactionId);
        $account = $transaction->account;

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'description' => [Rule::excludeIf(empty($request['description'])), 'string', 'max:500'],
            'amount' => ['required', 'decimal:0,2'],
            'custom_id' => [
                Rule::excludeIf(empty($request['custom_id'])),
                'min:3',
                'max:255',
                'string',
                Rule::unique('App\Models\Transaction', 'custom_id')->ignore($transactionId),
            ],
            'date' => ['required'],
        ]);

        $transaction->name = $validated['name'];
        $transaction->description = $validated['description'] ?? '';
        $transaction->amount = $validated['amount'];
        $transaction->custom_id = $validated['custom_id'] ?? '';
        $transaction->date = $validated['date'];

        if ($transaction->isDirty()) {
            $transaction->save();
        }

        if ($transaction->wasChanged('amount')) {
            $account->updateBalance();
        }

        return redirect(route('accounts.show', $account));
    }

    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:App\Models\Transaction,id',
        ]);

        $transaction = Transaction::find($validated['id']);
        $account = $transaction->account;

        $transaction->delete();
        $account->updateBalance();

        return redirect(route('accounts.show', $account));
    }
}
