<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Roles::insert([
            [ 
                'nama' => 'Admin',
                'created_by' => 'Odete Jaya Kreatif',
                'status' => 'aktif',

            ],
            [ 
                'nama' => 'Hotel',
                'created_by' => 'Odete Jaya Kreatif',
                'status' => 'aktif',

            ],
            [ 
                'nama' => 'Kuliner',
                'created_by' => 'Odete Jaya Kreatif',
                'status' => 'aktif',

            ],
            [ 
                'nama' => 'Anonim',
                'created_by' => 'Odete Jaya Kreatif',
                'status' => 'aktif',

            ],
        ]);

    }
}
