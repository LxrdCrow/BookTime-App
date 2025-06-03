<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Validator;

class OrderItemController extends Controller
{
    public function index()
    {
        $orderItems = OrderItem::all();
        return response()->json($orderItems);
    }

    public function create()
    {
        return response()->json(['message' => 'Form to create a new order item']);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $orderItem = OrderItem::create($validator->validated());
        return response()->json($orderItem, 201);
    }

    public function show(string $id)
    {
        $orderItem = OrderItem::findOrFail($id);
        return response()->json($orderItem);
    }

    public function edit(string $id)
    {
        $orderItem = OrderItem::findOrFail($id);
        return response()->json([
            'message' => 'Form to edit the order item',
            'order_item' => $orderItem
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'sometimes|exists:orders,id',
            'product_id' => 'sometimes|exists:products,id',
            'quantity' => 'sometimes|numeric|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $orderItem = OrderItem::findOrFail($id);
        $orderItem->update($validator->validated());

        return response()->json($orderItem);
    }

    public function destroy(string $id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $orderItem->delete();

        return response()->json(['message' => 'Order item deleted successfully']);
    }
}

