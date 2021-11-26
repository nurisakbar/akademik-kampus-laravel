<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('setting')->truncate();
        \DB::table('setting')->insert(
            [
                'nama_universitas'  => 'Politeknik TEDC Bandung',
                'email'             => 'info@poltektedc.ac.id',
                'no_telpon'         => '+6222-6645951',
                'fax'               =>  '+6222-6645951',
                'web'               =>  'http://www.poltektedc.ac.id',
                'alamat'            =>  'JL.Politeknik-Pasantren Km 2 Lantai 1, Kota Cimahi - Indonesia, Kode Pos 40513'
            ]
        );
    }
}
