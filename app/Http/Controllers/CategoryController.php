<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function index() {
        return Category::all(); 
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::create($request->all());
        return response()->json($category, 201);
    }

    public function show(Category $category) {
        return $category;
    }

    public function update(Request $request, Category $category) {
        $request->validate([
            'name' => 'string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update($request->all());
        return response()->json($category);
    }

    public function destroy(Category $category) {
        $category->delete();
        return response()->noContent();
    }
}