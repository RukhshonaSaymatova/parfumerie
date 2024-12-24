<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
        return Product::with('category')->get();
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        return Product::create($request->all());
    }

    public function show(Product $product) {
        return $product->load('category');
    }

    public function update(Request $request, Product $product) {
        $request->validate([
            'price' => 'numeric|min:0',
            'stock' => 'integer|min:0',
            'category_id' => 'exists:categories,id',
        ]);

        $product->update($request->all());
        return response()->json($product);
    }

    public function destroy(Product $product) {
        $product->delete();
        return response()->noContent();
    }
}

