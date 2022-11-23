<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//agregamos el modelo de permisos de spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            // roles
            'ver-rol' => 'Ver rol',
            'crear-rol' => 'Crear rol',
            'editar-rol' => 'Editar rol',
            'borrar-rol' => 'Borrar rol',

            //categoria Medicamentos
            'ver-categoriaMedicamentos'=> 'Ver categorías de medicamentos',
            'crear-categoriaMedicamentos'=> 'Crear categorías de medicamentos',
            'editar-categoriaMedicamentos' => 'Editar categorías de medicamentos',
            'borrar-categoriaMedicamentos' => 'Borrar categorías de medicamentos',

            //Medicamentos
            'ver-medicamentos' => 'Ver medicamentos',
            'crear-medicamentos' => 'Crear medicamentos',
            'editar-medicamentos' => 'Editar medicamentos',
            'borrar-medicamentos' => 'Borrar medicamentos',

            //aniVacunados
            'ver-aniVacunados' => 'Ver control de salud animal',
            'crear-aniVacunados' => 'Crear control de salud animal',
            'editar-aniVacunados' => 'Editar control de salud animal',
            'borrar-aniVacunados' => 'Borrar control de salud animal',

            //raza
            'ver-raza' => 'Ver razas',
            'crear-raza' => 'Crear razas',
            'editar-raza' => 'Editar razas',
            'borrar-raza' => 'Borrar razas',

            //raza
            'ver-enfermedad' => 'Ver enfermedades',
            'crear-enfermedad'  => 'Crear enfermedades',
            'editar-enfermedad'  => 'Editar enfermedades',
            'borrar-enfermedad'  => 'Borrar enfermedades',

            //registroAnimal
            'ver-registroAnimal'  => 'Ver registros animales',
            'crear-registroAnimal' => 'Crear registros animales',
            'editar-registroAnimal' => 'Editar registros animales',
            'borrar-registroAnimal' => 'Borrar registros animales',

            //animalPreñado
            'ver-animalPreñado' => 'Ver animales preñados',
            'crear-animalPreñado' => 'Crear animales preñados',
            'editar-animalPreñado' => 'Editar animales preñados',
            'borrar-animalPreñado' => 'Borrar animales preñados',

            //crearUsuario
            'admin-crearUsuario' => 'Permiso para crear usuarios',
        ];

        foreach($permisos as $permiso=>$valor) {
            Permission::create(['name'=>$permiso, 'nombreRol'=>$valor]);
        }
    }
}
