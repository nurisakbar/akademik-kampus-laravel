<?php

use Illuminate\Database\Seeder;
use App\Fakultas;

class FakultasTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_fakultas = [
            [
                'kode_fakultas' =>  'IF',
                'nama_fakultas' =>  'Teknik Informatika',
                'created_at'    =>  date("Y-m-d H:i:s"),
                'updated_at'    =>  date("Y-m-d H:i:s"),
            ],
            [
                'kode_fakultas' =>  'MS',
                'nama_fakultas' =>  'Teknik Mekanik Dan Mesin',
                'created_at'    =>  date("Y-m-d H:i:s"),
                'updated_at'    =>  date("Y-m-d H:i:s"),
            ],
            [   
                'kode_fakultas' =>  'EL',
                'nama_fakultas' => 'Teknik Elektronika Dan Robotic',
                'created_at'    =>  date("Y-m-d H:i:s"),
                'updated_at'    =>  date("Y-m-d H:i:s"),
            ],
            [
                'kode_fakultas' =>  'SP',
                'nama_fakultas' =>  'Teknik Sipil',
                'created_at'    =>  date("Y-m-d H:i:s"),
                'updated_at'    =>  date("Y-m-d H:i:s"),
            ],
        ];

        \DB::table('fakultas')->truncate();
        \DB::table('fakultas')->insert($data_fakultas);

    }
}
