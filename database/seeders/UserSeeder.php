<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
       DB::table('users')->insert([
       'name' => 'Erick Paredes',
       'email'=> 'rckmnlparedescabrera@gmail.com',
       'email_verified_at'=> now(),
       'password'=> Hash::make('password'),
       'phone_number'=>'+584241363215',
       'profile_image'=>'URL',
       'created_at'=>now(),
       'updated_at'=>now(),
       'login_at'=>now(),
       ]);
       
    }
}
