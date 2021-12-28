<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view('pages.transactionHistory',[
            'title' => 'Transaction history',
            'categories' => Category::all(),
            'transactions' => Transaction::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}
