<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageCategoryController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->roles == 'MANAGER') {
            return view('pages.admin.manageCategory',[
                'title' => 'Manage Category',
                'categories' => Category::latest()->paginate(4),
            ]);
        } 
        else {
            return redirect()->route('home');
        }
    }

    public function showEditPage($id)
    {
        if (Auth::check() && Auth::user()->roles == 'MANAGER') {
            return view('pages.admin.editCategory',[
                'title' => 'Edit Category',
                'categories' => Category::latest()->paginate(4),
                'category' => Category::find($id),
            ]);
        } 
        else {
            return redirect()->route('home');
        }
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'category' => 'required|min:5|unique:categories,category,'.$id,
            'image' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);
        
        $images = $request->file('image');
        Category::findOrFail($id)->update([
            'category' => $request->category,
            'image' => $images->getClientOriginalName(),
        ]);
        $images->move(public_path('img'), $images->getClientOriginalName());
        return redirect()->back()->with('success', 'Category Updated Successfully');
    }

    public function destroy($id)
    {
        if (Auth::check() && Auth::user()->roles == 'MANAGER') 
        {
            $category = Category::find($id);
            $category->delete();
            return redirect()->back()->with('success','Category Deleted Successfully');
        } 
        else {
            return redirect()->route('home');
        }
    }
}
