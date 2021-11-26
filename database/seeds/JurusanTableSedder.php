<?php

use Illuminate\Database\Seeder;
use App\Jurusan;

class JurusanTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_jurusan = [
            [
                'kode_jurusan'  =>  'D4TI',
                'nama_jurusan'  =>  'Teknik Informatika',
                'jenjang'       =>  'D4',
                'kode_fakultas' =>  'IF',
                'created_at'    =>  date("Y-m-d H:i:s"),
                'updated_at'    =>  date("Y-m-d H:i:s"),
            ],
            [
                'kode_jurusan'  =>  'D4KA',
                'nama_jurusan'  =>  'Komputer Akutansi',
                'jenjang'       =>  'D4',
                'kode_fakultas' =>  'IF',
                'created_at'    =>  date("Y-m-d H:i:s"),
                'updated_at'    =>  date("Y-m-d H:i:s"),
            ],
            [
                'kode_jurusan'  =>  'D4MD',
                'nama_jurusan'  =>  'Mekanik Industri Dan Desain',
                'jenjang'       =>  'D4',
                'kode_fakultas' =>  'MS',
                'created_at'    =>  date("Y-m-d H:i:s"),
                'updated_at'    =>  date("Y-m-d H:i:s"),
            ],
            [
                'kode_jurusan'  =>  'D4TO',
                'nama_jurusan'  =>  'Teknik Otomasi',
                'jenjang'       =>  'D4',
                'kode_fakultas' =>  'EL',
                'created_at'    =>  date("Y-m-d H:i:s"),
                'updated_at'    =>  date("Y-m-d H:i:s"),
            ],
            [
                'kode_jurusan'  =>  'D4KB',
                'nama_jurusan'  =>  'Kontruksi Bangunan',
                'jenjang'       =>  'D4',
                'kode_fakultas' =>  'SP',
                'created_at'    =>  date("Y-m-d H:i:s"),
                'updated_at'    =>  date("Y-m-d H:i:s"),
            ],
            [
                'kode_jurusan'  =>  'D3TK',
                'nama_jurusan'  =>  'Teknik Komputer',
                'jenjang'       =>  'D3',
                'kode_fakultas' =>  'IF',
                'created_at'    =>  date("Y-m-d H:i:s"),
                'updated_at'    =>  date("Y-m-d H:i:s"),
            ],
            [
                'kode_jurusan'  =>  'D3MS',
                'nama_jurusan'  =>  'Teknik Mesin Otomotif',
                'jenjang'       =>  'D3',
                'kode_fakultas' =>  'MS',
                'created_at'    =>  date("Y-m-d H:i:s"),
                'updated_at'    =>  date("Y-m-d H:i:s"),
            ],
            [
                'kode_jurusan'  =>  'D3RM',
                'nama_jurusan'  =>  'Rekamedis Dan & Sistem Informasi Kesehatan',
                'jenjang'       =>  'D3',
                'kode_fakultas' =>  'IF',
                'created_at'    =>  date("Y-m-d H:i:s"),
                'updated_at'    =>  date("Y-m-d H:i:s"),
            ],
            [
                'kode_jurusan'  =>  'D3KM',
                'nama_jurusan'  =>  'Teknik KIMIA',
                'jenjang'       =>  'D3',
                'kode_fakultas' =>  'TI',
                'created_at'    =>  date("Y-m-d H:i:s"),
                'updated_at'    =>  date("Y-m-d H:i:s"),
            ],
            [
                'kode_jurusan'  =>  'D3TE',
                'nama_jurusan'  =>  'Teknik Elektronika',
                'jenjang'       =>  'D3',
                'kode_fakultas' =>  'EL',
                'created_at'    =>  date("Y-m-d H:i:s"),
                'updated_at'    =>  date("Y-m-d H:i:s"),
            ],
            [
                'kode_jurusan'  =>  'D3AK',
                'nama_jurusan'  =>  'Akutansi',
                'jenjang'       =>  'D3',
                'kode_fakultas' =>  'IF',
                'created_at'    =>  date("Y-m-d H:i:s"),
                'updated_at'    =>  date("Y-m-d H:i:s"),
            ],
            [
                'kode_jurusan'  =>  'D3RB',
                'nama_jurusan'  =>  'Teknik Robotic',
                'jenjang'       =>  'D3',
                'kode_fakultas' =>  'EL',
                'created_at'    =>  date("Y-m-d H:i:s"),
                'updated_at'    =>  date("Y-m-d H:i:s"),
            ],
        ];

        \DB::table('jurusan')->truncate();
        \DB::table('jurusan')->insert($data_jurusan);
    }
}
