<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MembresTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('membres')->delete();
        
        \DB::table('membres')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'Joel Ahala',
                'phone_number' => '690653506',
                'email_address' => 'joelahala@gmail.com',
                'sex' => NULL,
                'profil' => NULL,
                'avatar' => '1162951662.png',
                'association_id' => 1,
                'cni' => '123456987',
                'role_name' => 'Membre',
                'password' => '$2y$10$Z.HyBWAY9jn0qBf7mdAifeiPjMcL7j4SIwBX2WwFURFV5fPy9tuvm',
                'status' => 'Active',
                'remember_token' => NULL,
                'created_at' => '2022-01-21 07:42:17',
                'updated_at' => '2022-01-24 00:55:04',
            ),
            1 => 
            array (
                'id' => 4,
                'name' => 'Leonel Moffo',
                'phone_number' => '657555232',
                'email_address' => 'leonelmoffo1@gmail.com',
                'sex' => NULL,
                'profil' => NULL,
                'avatar' => 'photo_defaults.jpg',
                'association_id' => 4,
                'cni' => NULL,
                'role_name' => 'Admin',
                'password' => '$2y$10$GfDrb/RNLfCmmmyF/l4CqeRMc3Oh4B.i.Rl8jKqxF99dqhJqDR2hq',
                'status' => 'Active',
                'remember_token' => NULL,
                'created_at' => '2022-01-23 22:18:51',
                'updated_at' => '2022-01-23 22:18:51',
            ),
            2 => 
            array (
                'id' => 5,
                'name' => 'Michel',
                'phone_number' => '698074991',
                'email_address' => 'michelamati1@gmail.com',
                'sex' => NULL,
                'profil' => NULL,
                'avatar' => 'photo_defaults.jpg',
                'association_id' => 4,
                'cni' => '123654785',
                'role_name' => 'Membre',
                'password' => '$2y$10$hATlDuyyprQHe8Nfk9dHeOFNi.fmG8W7KLQOzn4QO3N0hnKKiSp.W',
                'status' => 'Active',
                'remember_token' => NULL,
                'created_at' => '2022-01-23 22:49:22',
                'updated_at' => '2022-01-24 01:27:09',
            ),
        ));
        
        
    }
}