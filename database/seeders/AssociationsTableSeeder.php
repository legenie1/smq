<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AssociationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('associations')->delete();
        
        \DB::table('associations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'libelle' => 'Moini débutant',
                'session' => 'janvier - juin',
                'start' => '2022-01-15',
                'end' => '2022-01-29',
                'user_id' => 1,
                'status' => 'Active',
                'created_at' => '2022-01-15 12:18:53',
                'updated_at' => '2022-01-15 12:18:53',
            ),
            1 => 
            array (
                'id' => 2,
                'libelle' => 'Moini association 2',
                'session' => 'janvier - mai',
                'start' => '2022-01-21',
                'end' => '2022-01-29',
                'user_id' => 1,
                'status' => 'Active',
                'created_at' => '2022-01-21 08:29:11',
                'updated_at' => '2022-01-21 08:29:11',
            ),
            2 => 
            array (
                'id' => 4,
                'libelle' => 'Moini Leonel',
                'session' => 'janvier - juin',
                'start' => '2022-01-23',
                'end' => '2022-01-29',
                'user_id' => 5,
                'status' => 'Active',
                'created_at' => '2022-01-23 22:18:51',
                'updated_at' => '2022-01-23 22:18:51',
            ),
        ));
        
        
    }
}