<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentType;

class DocumentTypeController extends Controller
{
    public function index()
    {
        return DocumentType::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'abbreviation' => 'nullable|string|max:10',
        ]);

        return DocumentType::create([
            'name' => $request->name,
            'abbreviation' => $request->abbreviation,
            'creation_date' => now(),
            'update_creation' => now(),
        ]);
    }

    public function show($id)
    {
        return DocumentType::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $documentType = DocumentType::findOrFail($id);

        $documentType->update([
            'name' => $request->name,
            'abbreviation' => $request->abbreviation,
            'update_creation' => now(), // se actualiza manualmente
        ]);

        return $documentType;
    }

    public function destroy($id)
    {
        $documentType = DocumentType::findOrFail($id);
        $documentType->delete();

        return response()->json(['message' => 'Eliminado correctamente']);
    }
}