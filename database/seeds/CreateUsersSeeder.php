<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [

            [
               'id'=>'25769c6c-d34d-4bfe-ba98-e0ee856f3e7a',

               'name'=>'Admin',

               'email'=>'admin@gmail.com',

                'is_admin'=>'admin',

               'password'=> Hash::make('12345678'),

            ],

            [
              'id'=>'25769c6c-67jd-4bfe-ba98-343asfs8434',

               'name'=>'Kasir',

               'email'=>'kasir@gmail.com',

                'is_admin'=>'kasir',

               'password'=> Hash::make('12345678'),

            ],

        ];

  

        foreach ($user as $key => $value) {

            User::create($value);

        }
    }
}
