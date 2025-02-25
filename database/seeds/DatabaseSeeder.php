<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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

               'password'=> Hash::make('admin'),

            ],

            [
              'id'=>'25769c6c-67jd-4bfe-ba98-343asfs8434',

               'name'=>'Kasir',

               'email'=>'kasir@gmail.com',

                'is_admin'=>'kasir',

               'password'=> Hash::make('kasir'),

            ],

        ];

  

        foreach ($user as $key => $value) {

            User::create($value);

        }
    }
}
