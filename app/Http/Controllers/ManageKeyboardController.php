<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageKeyboardController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->roles == 'MANAGER') {
            return view('pages.admin.addkeyboard',[
                'title' => 'Add Keyboard',
                'categories' => Category::all(),
                'products' => Product::all()
            ]);
        }
        else {
            return redirect()->route('home');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|unique:products',
            'category_id' => 'required',
            'price' => 'required|gt:0',
            'description' => 'required|min:20',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);
        
        $images = $request->file('image');
        Product::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $images->getClientOriginalName(),
        ]);
        $images->move(public_path('img'), $images->getClientOriginalName());
        return redirect()->back()->with('success', 'Keyboard added successfully');
    }

    public function edit($id)
    {
        if (Auth::check() && Auth::user()->roles == 'MANAGER') {
            return view('pages.admin.updateKeyboard',[
                'title' => 'Update Keyboard',
                'categories' => Category::all(),
                'product' => Product::find($id),
            ]);
        }
        else {
            return redirect()->route('home');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:5|unique:products,title,'.$id,
            'category_id' => 'required',
            'price' => 'required|gt:0',
            'description' => 'required|min:20',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);
        
        $images = $request->file('image');
        Product::findOrFail($id)->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $images->getClientOriginalName()
        ]);
        $images->move(public_path('img'), $images->getClientOriginalName());
        return redirect()->back()->with('success', 'Keyboard Updated Successfully');   
    }

    public function destroy($id)
    {
        if (Auth::check() && Auth::user()->roles == 'MANAGER'){
            $product = Product::find($id);
            $product->delete();
            return redirect()->back()->with('success', 'Keyboard deleted successfully');
        }
        else {
            return redirect()->route('home');
        }
    }
}
