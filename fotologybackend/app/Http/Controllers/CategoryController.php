<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Mostrar una lista de categorías
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    // Crear una nueva categoría
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::create($validatedData);
        return response()->json($category, 201);
    }

    // Mostrar una categoría específica
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    // Actualizar una categoría
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update($validatedData);
        return response()->json($category);
    }

    // Eliminar una categoría
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
}