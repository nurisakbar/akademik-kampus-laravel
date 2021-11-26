<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SettingTableSeeder::class);
        $this->call(FakultasTableSedder::class);
        $this->call(JurusanTableSedder::class);
        $this->call(TahunAkademikTableSeeder::class);
        $this->call(MatakuliahTableSeeder::class);
        $this->call(KurikulumTableSeeder::class);
        
    }
}
