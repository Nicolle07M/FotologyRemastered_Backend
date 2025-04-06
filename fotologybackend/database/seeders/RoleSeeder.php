<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $roles = [
            ['name' => 'SUPER_ADMIN', 'description' => 'Usuario con acceso total al sistema.'],
            ['name' => 'PHOTHOGRAPHER', 'description' => 'Usuario que puede subir y gestionar fotos.'],
            ['name' => 'CLIENT', 'description' => 'Usuario que puede visualizar y contratar servicios.'],
        ];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role['name'],
                'description' => $role['description'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
