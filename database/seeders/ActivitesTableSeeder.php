<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ActivitesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('activites')->delete();
        
        \DB::table('activites')->insert(array (
            0 => 
            array (
                'id' => 1,
                'libelle' => 'Tontine',
                'association_id' => 2,
                'status' => 'Active',
                'created_at' => '2022-01-21 09:13:57',
                'updated_at' => '2022-01-21 09:30:06',
            ),
            1 => 
            array (
                'id' => 2,
                'libelle' => 'Epargne Crédit',
                'association_id' => 1,
                'status' => 'Active',
                'created_at' => '2022-01-21 09:14:33',
                'updated_at' => '2022-01-21 09:14:33',
            ),
            2 => 
            array (
                'id' => 4,
                'libelle' => 'Solidarité',
                'association_id' => 1,
                'status' => 'Active',
                'created_at' => '2022-01-21 09:31:41',
                'updated_at' => '2022-01-21 09:31:41',
            ),
            3 => 
            array (
                'id' => 5,
                'libelle' => 'Main levé',
                'association_id' => 1,
                'status' => 'Active',
                'created_at' => '2022-01-21 09:31:52',
                'updated_at' => '2022-01-21 09:31:52',
            ),
            4 => 
            array (
                'id' => 6,
                'libelle' => 'Projet',
                'association_id' => 1,
                'status' => 'Active',
                'created_at' => '2022-01-21 09:32:26',
                'updated_at' => '2022-01-21 09:32:26',
            ),
            5 => 
            array (
                'id' => 7,
                'libelle' => 'Evènement',
                'association_id' => 1,
                'status' => 'Active',
                'created_at' => '2022-01-21 09:32:38',
                'updated_at' => '2022-01-21 09:32:55',
            ),
        ));
        
        
    }
}