<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FilemanagerTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('filemanager')->delete();
        
        \DB::table('filemanager')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Screenshot_20210112-234149.png',
                'ext' => 'png',
                'file_size' => 658973.0,
                'user_id' => 5,
                'absolute_url' => 'http://localhost:8000/filemanager/uploads/Screenshot_20210112-234149.png',
                'extra' => '{"width": 1024, "height": 2275}',
                'created_at' => '2022-01-24 01:15:55',
                'updated_at' => '2022-01-24 01:15:55',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'PROGRAM AYAFOR.docx',
                'ext' => 'docx',
                'file_size' => 2366.0,
                'user_id' => 5,
                'absolute_url' => 'http://localhost:8000/filemanager/uploads/PROGRAM AYAFOR.docx',
                'extra' => '[]',
                'created_at' => '2022-01-24 01:21:08',
                'updated_at' => '2022-01-24 01:21:08',
            ),
        ));
        
        
    }
}