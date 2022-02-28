<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleTypeUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_type_users')->delete();
        
        \DB::table('role_type_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_type' => 'Admin',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'role_type' => 'Super Admin',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'role_type' => 'Financier',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'role_type' => 'Controleur',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'role_type' => 'Modérateur',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'role_type' => 'Membre',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}