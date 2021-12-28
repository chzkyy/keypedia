<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index($id)
    {
        if (Auth::check() && Auth::user()->roles == 'MANAGER') {
            return view('pages.admin.detail',[
                'keyboards' => Product::where('category_id', $id)->get(),
                'product' => Product::findOrFail($id),
                'title' => Product::find($id)->title,
                'categories' => Category::all(),
            ]);
        }
        //login menggunakan role user/guest
        else {
            return view('pages.detail',[
                'keyboards' => Product::where('category_id', $id)->get(),
                'product' => Product::findOrFail($id),
                'title' => Product::find($id)->title,
                'categories' => Category::all(),
            ]);
        }
    }

    public function store(Request $request)
    {
        Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'image' => $request->image,
        ]);

        return back()->with('success', 'Keyboard added to cart');
    }
}
