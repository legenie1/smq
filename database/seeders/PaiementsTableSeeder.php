<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaiementsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('paiements')->delete();
        
        \DB::table('paiements')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom_id' => 5,
                'activite_id' => 2,
                'montant' => '10000',
                'status' => 'Attente',
                'created_at' => '2022-01-25 10:10:42',
                'updated_at' => '2022-01-25 11:05:22',
            ),
            1 => 
            array (
                'id' => 3,
                'nom_id' => 5,
                'activite_id' => 1,
                'montant' => '7000',
                'status' => 'Attente',
                'created_at' => '2022-01-25 10:40:17',
                'updated_at' => '2022-01-25 10:40:17',
            ),
            2 => 
            array (
                'id' => 4,
                'nom_id' => 5,
                'activite_id' => 1,
                'montant' => '7000',
                'status' => 'Attente',
                'created_at' => '2022-01-25 10:40:35',
                'updated_at' => '2022-01-25 10:40:35',
            ),
        ));
        
        
    }
}