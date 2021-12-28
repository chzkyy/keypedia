<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DetailTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder\Trait_;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        Transaction::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);

        Cart::where('user_id', auth()->user()->id)->delete();
        return redirect()->back()->with('success', 'Successfully checkout');
    }
}
