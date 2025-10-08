<?php

namespace App\Http\Controllers;

use App\Enums\CurrencyTypes;
use App\Models\Account;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    
    public function index(){
        $accounts = Auth::user()->accounts;
        $currencyOptions = $this->getCurrencyOptions();

        return Inertia::render('account/Accounts',
        [
            'userAccounts' => $accounts,
            'currencyOptions' => $currencyOptions  
        ]);
    }

    public function show(Account $account){
        $transactions = $account->transactions;

        return Inertia::render('account/Show',
        [
            'accountViewed' => $account,
            'transactions' => $transactions,
            'currencyOptions' => $this->getCurrencyOptions()
        ]);
    }


    public function store(Request $request){
        $validated = $request->validate([
            'account_name' => 'required|alpha_num|max:50|unique:App\Models\Account',
            'account_number' => 'required|alpha_num|max:50|unique:App\Models\Account',
            'currency' => ['required', Rule::in($this->getCurrencyOptions("value"))],
        ]);

        $validated['balance'] = 0;
        $validated['user_id'] = Auth::id();

        Account::create($validated);
        
        return redirect(route('accounts'));
    }

    public function update(int $id, Request $request){
        $account = Account::findOrFail($id);

        $validated = $request->validate([
            'account_name' => [
                'required',
                'string',
                'max:50',
                Rule::unique('App\Models\Account')->ignore($account->id)],
            'account_number' => [
                'required',
                'alpha_num',
                'max:50',
                Rule::unique('App\Models\Account')->ignore($account->id)],
            'currency' => ['required', Rule::in($this->getCurrencyOptions("value"))],
        ]);

        $account->account_name = $validated['account_name'];
        $account->account_number = $validated['account_number'];
        $account->currency = $validated['currency'];

        if($account->isDirty())
            $account->save();

        redirect(route('account.show',$account));
    }

    public function destroy(Request $request){
        $validated = $request->validate([
            'id' => 'required|exists:App\Models\Account,id'
        ]);

        Account::find($validated['id'])->delete();

        return redirect(route('accounts'));
    }

    private function getCurrencyOptions($type = null){
        if($type == "key"){
            return array_map(function($enum){
                return $enum->name;
            },CurrencyTypes::cases());
        }

        if($type == "value"){
            return array_map(function($enum){
                return $enum->value;
            },CurrencyTypes::cases());
        }

        return array_map(function($enum){
            return ['name' => $enum->name, 'value' => $enum->value];
        },CurrencyTypes::cases());
    }
}
