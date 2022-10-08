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
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //categoria Medicamentos
            'ver-categoriaMedicamentos',
            'crear-categoriaMedicamentos',
            'editar-categoriaMedicamentos',
            'borrar-categoriaMedicamentos',

            //Medicamentos
            'ver-medicamentos',
            'crear-medicamentos',
            'editar-medicamentos',
            'borrar-medicamentos',

            //aniVacunados
            'ver-aniVacunados',
            'crear-aniVacunados',
            'editar-aniVacunados',
            'borrar-aniVacunados',

            //raza
            'ver-raza',
            'crear-raza',
            'editar-raza',
            'borrar-raza',

            //raza
            'ver-enfermedad',
            'crear-enfermedad',
            'editar-enfermedad',
            'borrar-enfermedad',

            //registroAnimal
            'ver-registroAnimal',
            'crear-registroAnimal',
            'editar-registroAnimal',
            'borrar-registroAnimal',

            //animalPreñado
            'ver-animalPreñado',
            'crear-animalPreñado',
            'editar-animalPreñado',
            'borrar-animalPreñado',

            //crearUsuario
            'admin-crearUsuario',
        ];

        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}
