<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    // Mostrar una lista de portafolios
    public function index()
    {
        $portfolios = Portfolio::with('photographer.person')->get(); // Incluye la relación con Photographer y People
        return response()->json($portfolios);
    }

    // Crear un nuevo portafolio
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photographer_id' => 'required|exists:photographers,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|string',
        ]);

        $portfolio = Portfolio::create($validatedData);
        return response()->json($portfolio, 201);
    }

    // Mostrar un portafolio específico
    public function show($id)
    {
        $portfolio = Portfolio::with('photographer.person')->findOrFail($id);
        return response()->json($portfolio);
    }

    // Actualizar un portafolio
    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $validatedData = $request->validate([
            'photographer_id' => 'sometimes|required|exists:photographers,id',
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|string',
        ]);

        $portfolio->update($validatedData);
        return response()->json($portfolio);
    }

    // Eliminar un portafolio
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();
        return response()->json(['message' => 'Portfolio deleted successfully']);
    }
}