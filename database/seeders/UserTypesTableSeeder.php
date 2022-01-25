<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_types')->delete();
        
        \DB::table('user_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'type_name' => 'Active',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'type_name' => 'Desactiver',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}