<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AccountController extends Controller
{
    
    public function index(){
        $accounts = Auth::user()->accounts;

        return Inertia::render('account/Accounts',['userAccounts' => $accounts]);
    }
}
