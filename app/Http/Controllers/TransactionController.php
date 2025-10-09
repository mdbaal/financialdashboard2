<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TransactionController extends Controller
{
    public function store(Request $request, int $account_id){
        $account = Account::findOrFail($account_id);

        $validated = $request->validate([
            'name' => ['required', 'string','max:255','min:3'],
            'description' => ['string','max:500',],
            'amount' => ['required', 'max:10' ,'decimal:2'],
            'custom_id' => [Rule::excludeIf(empty($request['custom_id'])), 'min:3','max:255','string', Rule::unique('App\Models\Transaction','custom_id')]
        ]);


        $validated['currency'] = $account->currency;
        $validated['account_id'] = $account->id;

        Transaction::create($validated);

        return redirect(route('accounts.show', $account));
    }

    public function update(int $accountId, int $transactionId, Request $request){
        $account = Account::findOrFail($accountId);
        $transaction = Transaction::findOrFail($transactionId);

        $validated = $request->validate([
            'name' => ['string','max:255','min:3'],
            'description' => ['string','max:500',],
            'amount' => ['max:8' ,'decimal:2', 'gt:0'],
            'custom_id' => ['min:3','max:255','string', Rule::unique('App\Models\Transaction','custom_id')->ignore($transactionId)]
        ]);

        $transaction->name = $validated['name'];
        $transaction->description = $validated['description'];
        $transaction->amount = $validated['amount'];
        $transaction->custom_id = $validated['custom_id'];

        if($transaction->isDirty())
            $transaction->save();

        return redirect(route('accounts.show', $account));
    }

    public function destroy(Request $request, int $account_id){
        $validated = $request->validate([
            'id' => 'required|exists:App\Models\Transaction,id'
        ]);

        Transaction::find($validated['id'])->delete();

        return redirect(route('accounts.show',Account::find($account_id)));
    }

}
