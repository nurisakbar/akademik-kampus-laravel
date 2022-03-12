<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        user::create(['name'=>'administrator', 'password'=>\Hash::make('password'),'email'=>'administrator@gmail.com']);
    }
}
