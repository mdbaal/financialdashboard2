<?php

namespace App\Http\Controllers;

use App\Enums\CurrencyTypes;
use App\Models\Account;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

use function Illuminate\Support\enum_value;
use function Pest\Laravel\options;

class AccountController extends Controller
{
    
    public function index(){
        $accounts = Auth::user()->accounts;
        $currencyOptions = array_map(function($enum){
            return ['name' => $enum->name, 'value' => $enum->value];
        },CurrencyTypes::cases());

        return Inertia::render('account/Accounts',
        [
            'userAccounts' => $accounts,
            'currencyOptions' => $currencyOptions  
        ]);
    }


    public function store(Request $request){
        $validated = $request->validate([
            'account_name' => 'required|alpha_num|max:50',
            'account_number' => 'required|alpha_num|max:50',
            'currency' => ['required'],
        ]);

        $validated['balance'] = 0;
        $validated['user_id'] = Auth::id();

        Account::create($validated);
        
        return redirect(route('accounts'));
    }
}
