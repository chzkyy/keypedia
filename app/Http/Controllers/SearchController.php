<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        return view('pages.search',[
            "product" => Product::latest()->filter(request(['search'])) 
                        ->paginate(4)->withQueryString(),
            'categories' => Category::all(),
        ]);
    }
}
