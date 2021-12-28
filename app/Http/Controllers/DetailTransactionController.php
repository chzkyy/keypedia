<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DetailTransactionController extends Controller
{
    public function index($id)
    {
        return view('pages.transactionDetailHistory',[
            'title' => 'Details Transaction',
            'categories' => Category::all(),
            'transactions' => Transaction::where('id', $id)->get(),
            'crateat' => Transaction::where('id', $id)->first()->created_at,
        ]);
    }
}
