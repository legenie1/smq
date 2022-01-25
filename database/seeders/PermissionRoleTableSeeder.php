<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission_role')->delete();
        
        \DB::table('permission_role')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'permission_id' => 2,
            ),
            1 => 
            array (
                'role_id' => 3,
                'permission_id' => 2,
            ),
            2 => 
            array (
                'role_id' => 2,
                'permission_id' => 2,
            ),
            3 => 
            array (
                'role_id' => 2,
                'permission_id' => 1,
            ),
            4 => 
            array (
                'role_id' => 2,
                'permission_id' => 3,
            ),
            5 => 
            array (
                'role_id' => 1,
                'permission_id' => 1,
            ),
            6 => 
            array (
                'role_id' => 1,
                'permission_id' => 3,
            ),
            7 => 
            array (
                'role_id' => 1,
                'permission_id' => 4,
            ),
            8 => 
            array (
                'role_id' => 1,
                'permission_id' => 5,
            ),
            9 => 
            array (
                'role_id' => 1,
                'permission_id' => 6,
            ),
            10 => 
            array (
                'role_id' => 1,
                'permission_id' => 7,
            ),
            11 => 
            array (
                'role_id' => 1,
                'permission_id' => 8,
            ),
            12 => 
            array (
                'role_id' => 1,
                'permission_id' => 9,
            ),
            13 => 
            array (
                'role_id' => 1,
                'permission_id' => 10,
            ),
            14 => 
            array (
                'role_id' => 1,
                'permission_id' => 11,
            ),
            15 => 
            array (
                'role_id' => 1,
                'permission_id' => 12,
            ),
            16 => 
            array (
                'role_id' => 1,
                'permission_id' => 13,
            ),
            17 => 
            array (
                'role_id' => 1,
                'permission_id' => 16,
            ),
            18 => 
            array (
                'role_id' => 1,
                'permission_id' => 17,
            ),
            19 => 
            array (
                'role_id' => 1,
                'permission_id' => 18,
            ),
            20 => 
            array (
                'role_id' => 1,
                'permission_id' => 19,
            ),
            21 => 
            array (
                'role_id' => 1,
                'permission_id' => 20,
            ),
            22 => 
            array (
                'role_id' => 1,
                'permission_id' => 21,
            ),
            23 => 
            array (
                'role_id' => 1,
                'permission_id' => 22,
            ),
            24 => 
            array (
                'role_id' => 2,
                'permission_id' => 4,
            ),
            25 => 
            array (
                'role_id' => 2,
                'permission_id' => 5,
            ),
            26 => 
            array (
                'role_id' => 2,
                'permission_id' => 6,
            ),
            27 => 
            array (
                'role_id' => 2,
                'permission_id' => 7,
            ),
            28 => 
            array (
                'role_id' => 2,
                'permission_id' => 8,
            ),
            29 => 
            array (
                'role_id' => 2,
                'permission_id' => 9,
            ),
            30 => 
            array (
                'role_id' => 2,
                'permission_id' => 10,
            ),
            31 => 
            array (
                'role_id' => 2,
                'permission_id' => 11,
            ),
            32 => 
            array (
                'role_id' => 2,
                'permission_id' => 12,
            ),
            33 => 
            array (
                'role_id' => 2,
                'permission_id' => 13,
            ),
            34 => 
            array (
                'role_id' => 2,
                'permission_id' => 16,
            ),
            35 => 
            array (
                'role_id' => 2,
                'permission_id' => 17,
            ),
            36 => 
            array (
                'role_id' => 2,
                'permission_id' => 18,
            ),
            37 => 
            array (
                'role_id' => 2,
                'permission_id' => 19,
            ),
            38 => 
            array (
                'role_id' => 2,
                'permission_id' => 20,
            ),
            39 => 
            array (
                'role_id' => 2,
                'permission_id' => 21,
            ),
            40 => 
            array (
                'role_id' => 2,
                'permission_id' => 22,
            ),
        ));
        
        
    }
}