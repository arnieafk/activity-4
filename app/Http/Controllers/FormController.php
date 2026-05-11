<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        // VALIDATION
        $request->validate([
            'vendor_name' => 'required|min:3',
            'email' => 'required|email',
            'product_name' => 'required|min:3',
            'price' => 'required|numeric|min:1',
            'category' => 'required',
            'description' => 'required|min:10',
        ]);

        // If validation passes
        return back()->with('success', 'Product successfully listed!');
    }
}
