<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public function index() {
        return Category::all();
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:categories,name|max:100',
        ]);

        return Category::create($request->all());
    }

    public function update(Request $request, $id) {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return $category;
    }

    public function destroy($id) {
        Category::destroy($id);
        return response()->json(['message' => 'Category deleted.']);
    }
}
