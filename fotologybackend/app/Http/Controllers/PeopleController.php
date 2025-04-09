<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    // Mostrar una lista de todas las personas
    public function index()
    {
        $people = People::with('documentType')->get(); // Incluye la relación con document_types
        return response()->json($people);
    }

    // Crear una nueva persona
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'birth_date' => 'required|date',
        'email' => 'required|email|unique:people,email',
        'document_type_id' => 'required|exists:document_types,id',
        'document_number' => 'required|string|max:50|unique:people,document_number',
        'photo' => 'nullable|string',
        'address' => 'required|string|max:255',
    ]);

    // Crear la persona
    $person = People::create($validatedData);

    // Crear el usuario automáticamente
    $password = strtoupper(substr($person->first_name, 0, 1)) . $person->document_number; // Contraseña: primera letra del nombre en mayúscula + número de documento
    $user = \App\Models\Users::create([
        'people_id' => $person->id, // Relación con la persona creada
        'password' => bcrypt($password), // Encriptar la contraseña
    ]);

    // Asignar un rol al usuario automáticamente
    \DB::table('usersRole')->insert([
        'user_id' => $user->id,
        'role_id' => 2, // Cambia este ID por el ID del rol que deseas asignar (por ejemplo, "cliente" o "fotógrafo")
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return response()->json([
        'person' => $person,
        'user' => $user,
        'message' => 'Persona, usuario y rol creados exitosamente.',
    ], 201);
}

    // Mostrar una persona específica
    public function show($id)
    {
        $person = People::with('documentType')->findOrFail($id);
        return response()->json($person);
    }

    // Actualizar una persona
    public function update(Request $request, $id)
    {
        $person = People::findOrFail($id);

        $validatedData = $request->validate([
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'phone' => 'sometimes|required|string|max:15',
            'birth_date' => 'sometimes|required|date',
            "email" => 'sometimes|required|email|unique:people,email,'.$person->id,
            'document_type_id' => 'sometimes|required|exists:document_types,id',
            'document_number' => 'sometimes|required|string|max:50|unique:people,document_number,' . $id,
            'photo' => 'nullable|string',
            'address' => 'sometimes|required|string|max:255',
        ]);

        $person->update($validatedData);
        return response()->json($person);
    }

    // Eliminar una persona
    public function destroy($id)
    {
        $person = People::findOrFail($id);
        $person->delete();
        return response()->json(['message' => 'Person deleted successfully']);
    }
}