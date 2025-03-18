<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = new Category();
        return response()->json([
            'status' => true,
            'categories' => $category::orderBy('category_id', 'desc')->take(25)->get()
        ]);
    }

    public function create(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->timestamps = false;
        $category->save();
        return response()->json(['category' => $category], 200);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
    }
    
    public function delete(Request $request)
    {
        $id= $request->id;
        $category = Category::find($id);
        $category->delete();
    }

    public function count() {
        $count = Category::count();
        return response()->json([
            'status' => true,
            'count' => $count
        ]);
    }
}
