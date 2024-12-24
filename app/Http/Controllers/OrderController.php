<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller {
    public function index() {
        return Order::with('customer', 'products')->get(); 
    }

    public function store(Request $request) {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|string',
        ]);

        $order = Order::create($request->all());
        $order->products()->sync($request->input('products', []));  // Если у заказа есть продукты
        return response()->json($order, 201);
    }

    public function show(Order $order) {
        return $order->load('customer', 'products');
    }

    public function update(Request $request, Order $order) {
        $request->validate([
            'total_amount' => 'numeric|min:0',
            'status' => 'string',
        ]);

        $order->update($request->all());
        $order->products()->sync($request->input('products', []));  // Обновление продуктов
        return response()->json($order);
    }

    public function destroy(Order $order) {
        $order->delete();
        return response()->noContent();
    }
}
