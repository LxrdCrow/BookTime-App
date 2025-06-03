<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'List of categories']);
    }

    public function create()
    {
        $categories = Category::all();
        return response()->json(['message' => 'Form to create a new category']);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $category = Category::create($validator->validated());

        return response()->json($category, 201);
    }

    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return response()->json(['message' => 'Form to edit the category', 'category' => $category]);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $category = Category::findOrFail($id);
        $category->update($validator->validated());

        return response()->json($category);
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
}

