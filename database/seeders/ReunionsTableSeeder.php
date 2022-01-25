<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReunionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('reunions')->delete();
        
        \DB::table('reunions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'contenu' => '<h2 style="text-align: center; ">rapport de 2022</h2><p><span style="font-family: &quot;Times New Roman&quot;;">Durans la reunion d\'aujourd\'hui, nous avons eu à toucher plusieurs pointset nous avons donc pris des resolution pour le compte de l\'année à venir</span></p>',
                'created_at' => '2022-01-21 11:07:33',
                'updated_at' => '2022-01-21 11:31:17',
            ),
        ));
        
        
    }
}