<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::all();
        return response()->json($carts);
    }

    public function create()
    {
        return response()->json(['message' => 'Form to create a new cart']);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $cart = Cart::create($validator->validated());
        return response()->json($cart, 201);
    }

    public function show(string $id)
    {
        $cart = Cart::find($id);
        if (!$cart) {
            return response()->json(['message' => 'Cart not found'], 404);
        }
        return response()->json($cart);
    }

    public function edit(string $id)
    {
        $cart = Cart::find($id);
        if (!$cart) {
            return response()->json(['message' => 'Cart not found'], 404);
        }
        return response()->json(['message' => 'Form to edit the cart', 'cart' => $cart]);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'sometimes|required|exists:users,id',
            'product_id' => 'sometimes|required|exists:products,id',
            'quantity' => 'sometimes|required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $cart = Cart::find($id);
        if (!$cart) {
            return response()->json(['message' => 'Cart not found'], 404);
        }

        $cart->update($validator->validated());
        return response()->json($cart);
    }

    public function destroy(string $id)
    {
        $cart = Cart::find($id);
        if (!$cart) {
            return response()->json(['message' => 'Cart not found'], 404);
        }

        $cart->delete();
        return response()->json(['message' => 'Cart deleted successfully']);
    }
}

