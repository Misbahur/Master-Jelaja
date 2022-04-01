<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as DataPalsu;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $datapalsu = DataPalsu::create('id_ID');
        $data = [];
        for($i=0; $i<100; $i++){
            $gender = $datapalsu->randomElement(['male', 'female']);
            $data[] = [
                'email'     => $datapalsu->email(),
                'roles_id'  => rand(1,4),
                'nama' => $datapalsu->name($gender),
                'photo'  => 'Photo Kosong',
                'nomer_telepon' => '0',
                'nomer_ponsel' => '0',
                'tempat_lahir' => $datapalsu->city(),
                'tanggal_lahir' => $datapalsu->dateTimeThisCentury()->format('Y-m-d'),
                'alamat'   => $datapalsu->address(),
                'nomor_ktp' => rand(2,15),
                'status'    => 'aktif',
                'created_by' => 'Odete Jaya Kreatif',
                'password'  => Hash::make('1234567')
            ];
        }
        (new User())->insert($data);
    }
}
