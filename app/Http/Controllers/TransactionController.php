<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyTransactionRequest;
use App\Http\Requests\Transaction\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Account;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function store(StoreTransactionRequest $request)
    {
        $validated = $request->validated();

        $account = Account::find($validated['account_id']);

        $validated['currency'] = $account->currency;
        $validated['account_id'] = $account->id;

        Transaction::create($validated);

        $account->updateBalance($validated['amount']);

        return redirect(route('accounts.show', $account));
    }

    public function update(UpdateTransactionRequest $request, int $transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);
        $account = $transaction->account;

        $validated = $request->validated();

        $transaction->update($validated);

        if ($transaction->wasChanged('amount')) {
            $account->updateBalance($transaction->amount, $transaction->getPrevious()['amount'], true);
        }

        return redirect(route('accounts.show', $account));
    }

    public function destroy(DestroyTransactionRequest $request)
    {
        $validated = $request->validated();

        $transaction = Transaction::find($validated['id']);
        $account = $transaction->account;

        $amount = $transaction->amount;
        $transaction->delete();
        $account->updateBalance($amount, 0, false, true);

        return redirect(route('accounts.show', $account));
    }
}
