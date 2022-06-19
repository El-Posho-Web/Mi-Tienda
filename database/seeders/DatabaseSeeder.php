<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Categoria;
use App\Models\TipoUsuario;
use App\Models\EstadoEnvio;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        EstadoEnvio::factory()->create([
            'nombre' => 'pendiente'
        ]);

        EstadoEnvio::factory()->create([
            'nombre' => 'confirmado'
        ]);

        EstadoEnvio::factory()->create([
            'nombre' => 'cancelado'
        ]);

        TipoUsuario::factory()->create([
            'nombre' => 'administrador'
        ]);

        TipoUsuario::factory()->create([
            'nombre' => 'cliente'
        ]);

        User::factory()->create([
            'nombre' => 'admin',
            'apellido' => 'admin',
            'dni' => '12345678',
            'domicilio' => 'asd',
            'email' => 'admin@ejemplo.com',
            'id_tipo_usuario' => 1,
            'password' => '1234'
        ]);

        Categoria::factory()->create([
            'nombre' => 'Deportes'
        ]);

        Categoria::factory()->create([
            'nombre' => 'Tecnologia'
        ]);

        Categoria::factory()->create([
            'nombre' => 'Muebles'
        ]);

        Categoria::factory()->create([
            'nombre' => 'Hogar'
        ]);

         \App\Models\User::factory(10)->create();
         \App\Models\Producto::factory(40)->create();
    }
}
