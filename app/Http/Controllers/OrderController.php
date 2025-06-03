<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
    }

    public function create()
    {
        return response()->json(['message' => 'Form to create a new order']);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'total' => 'required|numeric|min:0',
            'status' => 'required|string|in:pending,processing,completed,cancelled',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $order = Order::create($validator->validated());

        return response()->json($order, 201);
    }

    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        return response()->json($order);
    }

    public function edit(string $id)
    {
        $order = Order::findOrFail($id);
        return response()->json([
            'message' => 'Form to edit the order',
            'order' => $order
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'sometimes|exists:users,id',
            'total' => 'sometimes|numeric|min:0',
            'status' => 'sometimes|string|in:pending,processing,completed,cancelled',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $order = Order::findOrFail($id);
        $order->update($validator->validated());

        return response()->json($order);
    }

    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully']);
    }
}

