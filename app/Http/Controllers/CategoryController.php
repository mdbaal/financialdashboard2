<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Auth()->user()->categories;

        return Inertia::render('Categories',
            [
                'categories' => $categories->load('transactions'),
            ]
        );
    }
}
