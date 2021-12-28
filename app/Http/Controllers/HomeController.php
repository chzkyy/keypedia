<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //login menggunakan role manager
        if (Auth::check() && Auth::user()->roles == 'MANAGER') {
            return view('pages.admin.dashboard',[
                'title' => 'Home',
                'categories' => Category::latest()->paginate(4),
            ]);
        }
        //login menggunakan role user/guest
        else {
            return view('pages.home', [
                'title' => 'Home',
                'categories'=> Category::latest()->paginate(4),
            ]);
        }
    }
}
