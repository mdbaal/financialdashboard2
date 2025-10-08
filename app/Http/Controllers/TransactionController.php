<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TransactionController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'account_id' => ['required', 'exists:accounts,id'],
            'name' => ['required', 'string','max:255','min:3'],
            'description' => ['string','max:500',],
            'amount' => ['required', 'max:8' ,'decimal:2', 'gt:0'],
            'custom_id' => ['min:3','max:255','string', Rule::unique('App\Models\Transaction','custom_id')]
        ],
            stopOnFirstFailure: true,
        );

        $account = Account::find($validated['account_id']);

        $validated['currency'] = $account->currency;

        Transaction::create($validated);

        return redirect(route('accounts.show', $account));
    }

    public function update(int $id, Request $request){
        $validated = $request->validate([
            'account_id' => ['required', 'exists:accounts,id'],
            'name' => ['string','max:255','min:3'],
            'description' => ['string','max:500',],
            'amount' => ['max:8' ,'decimal:2', 'gt:0'],
            'custom_id' => ['min:3','max:255','string', Rule::unique('App\Models\Transaction','custom_id')->ignore($id)]
        ]);

        $account = Account::find($validated['account_id']);
        $transaction = Transaction::findOrFail($id);

        $transaction->name = $validated['name'];
        $transaction->description = $validated['description'];
        $transaction->amount = $validated['amount'];
        $transaction->custom_id = $validated['custom_id'];

        if($transaction->isDirty())
            $transaction->save();

        return redirect(route('accounts.show', $account));
    }

    public function destroy(Request $request){
        $validated = $request->validate([
            'id' => 'required|exists:App\Models\Transaction,id',
            'account_id' => 'required|exists:App\Models\Account,id'
        ]);

        Transaction::find($validated['id'])->delete();

        return redirect(route('accounts.show',Account::find($validated['account_id'])));
    }

}
