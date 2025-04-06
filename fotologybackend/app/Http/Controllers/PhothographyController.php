<?php

namespace App\Http\Controllers;

use App\Models\Photography;
use Illuminate\Http\Request;

class PhotographyController extends Controller
{
    public function index()
    {
        return Photography::with('photographer')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_path' => 'required|string',
            'photographer_id' => 'required|exists:photographers,id',
        ]);

        return Photography::create($validated);
    }

    public function show($id)
    {
        return Photography::with('photographer')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $photography = Photography::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'image_path' => 'sometimes|string',
            'photographer_id' => 'sometimes|exists:photographers,id',
        ]);

        $photography->update($validated);

        return $photography;
    }

    public function destroy($id)
    {
        $photography = Photography::findOrFail($id);
        $photography->delete();

        return response()->noContent();
    }
}