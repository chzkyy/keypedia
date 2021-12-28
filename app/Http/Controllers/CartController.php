<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\DetailTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.cart',[
            'title' => 'My Cart',
            'product' => Product::all(),
            'categories' => Category::all(),
            'cart' => Cart::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function update(Request $request, $id)
    {
        Cart::findOrFail($id)->update([
            'quantity' => $request->quantity
        ]);

        return back()->with('success', 'Quantity has been updated');
    }
}
