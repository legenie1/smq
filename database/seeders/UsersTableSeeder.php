<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Moffo Sergeo',
                'email' => 'sergeomoffo1@gmail.com',
                'phone_number' => '690653506',
                'status' => 'Active',
                'role_name' => 'Admin',
                'avatar' => '1162951662.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Yaela.nAVoEzCruljzYFSuXmNUkcZq6h8FOWtgF/uUjVlvX5ICFoG',
                'remember_token' => NULL,
                'created_at' => '2022-01-15 12:14:33',
                'updated_at' => '2022-01-21 06:01:43',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Chiamuso Simon',
                'email' => 'simonchiamuso1@gmail.com',
                'phone_number' => '675514903',
                'status' => 'Desactiver',
                'role_name' => 'Admin',
                'avatar' => 'photo_defaults.jpg',
                'email_verified_at' => NULL,
                'password' => '$2y$10$QyMFigcBnTnMjMJUVrUA.OMu7KoLQ8sroRzabnhM1GurC5n.wfYYe',
                'remember_token' => NULL,
                'created_at' => '2022-01-18 21:57:54',
                'updated_at' => '2022-01-21 06:06:39',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 5,
                'name' => 'Leonel Moffo',
                'email' => 'leonelmoffo1@gmail.com',
                'phone_number' => '657555232',
                'status' => 'Active',
                'role_name' => 'Admin',
                'avatar' => '952097999.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$00P72C1fFGTgggLt/4oX0O9hUFlSJEMVmF/m.R8ne/35V8iXHP8fi',
                'remember_token' => NULL,
                'created_at' => '2022-01-23 22:18:51',
                'updated_at' => '2022-01-24 01:30:25',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 6,
                'name' => 'Michel',
                'email' => 'michelamati1@gmail.com',
                'phone_number' => '698074991',
                'status' => 'Desactiver',
                'role_name' => 'Financier',
                'avatar' => 'photo_defaults.jpg',
                'email_verified_at' => NULL,
                'password' => '$2y$10$QIs74xCGPny8bCLYIbWymexsoQC/4fQqbFN8fWj/WvVzWvh8ylo6i',
                'remember_token' => NULL,
                'created_at' => '2022-01-23 22:49:22',
                'updated_at' => '2022-01-24 14:07:05',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}