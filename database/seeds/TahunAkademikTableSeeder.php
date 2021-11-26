<?php

use Illuminate\Database\Seeder;

class TahunAkademikTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_tahun = [
            [
                'kode_tahun_akademik'   =>  '20181',
                'tahun_akademik'        =>  '2018 - 2019 Semester Gajil',
                'status'                =>  'y',
                'created_at'    =>  date("Y-m-d H:i:s"),
                'updated_at'    =>  date("Y-m-d H:i:s"),
            ],
            [
                'kode_tahun_akademik'   =>  '20182',
                'tahun_akademik'        =>  '2018 - 2019 Semester Genap',
                'status'                =>  'n',
                'created_at'    =>  date("Y-m-d H:i:s"),
                'updated_at'    =>  date("Y-m-d H:i:s"),
            ]
        ];

        \DB::table('tahun_akademik')->truncate();
        DB::table('tahun_akademik')->insert($data_tahun);
    }
}
