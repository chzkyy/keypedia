<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index($id)
    {

        if (Auth::check() && Auth::user()->roles == 'MANAGER') {
            return view('pages.admin.category',[
                'keyboards' => Product::where('category_id', $id)->get(),
                'title' => Category::find($id)->category,
                'categories' => Category::all(),
                'page' => Category::latest()->paginate(4)
            ]);
        }
        //login menggunakan role user/guest
        else {
            return view('pages.category',[
                'keyboards' => Product::where('category_id', $id)->get(),
                'title' => Category::find($id)->category,
                'categories' => Category::all(),
                'page' => Category::latest()->paginate(4)
            ]);
        }
    }
}
