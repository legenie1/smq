<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('events')->delete();
        
        \DB::table('events')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'jeux',
                'start_time' => '2022-01-24 10:44:22',
                'end_time' => '2022-01-25 10:44:23',
                'recurrence' => 'daily',
                'created_at' => '2022-01-25 09:39:31',
                'updated_at' => '2022-01-25 09:39:30',
                'deleted_at' => NULL,
                'event_id' => 3,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Premier tour',
                'start_time' => '2022-01-24 10:44:23',
                'end_time' => '2022-01-27 10:44:23',
                'recurrence' => 'weekly',
                'created_at' => '2022-01-24 20:14:59',
                'updated_at' => '2022-01-24 20:14:59',
                'deleted_at' => NULL,
                'event_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Deuxième tour Epargne',
                'start_time' => '2022-01-24 10:44:23',
                'end_time' => '2022-01-28 10:44:23',
                'recurrence' => 'weekly',
                'created_at' => '2022-01-24 20:16:37',
                'updated_at' => '2022-01-25 09:45:00',
                'deleted_at' => '2022-01-25 09:45:00',
                'event_id' => 2,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Réunion du 12 Janvier',
                'start_time' => '2022-01-03 10:44:23',
                'end_time' => '2022-01-03 15:44:23',
                'recurrence' => 'monthly',
                'created_at' => '2022-01-24 21:05:48',
                'updated_at' => '2022-01-24 21:05:48',
                'deleted_at' => NULL,
                'event_id' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Tour 2',
                'start_time' => '2022-01-25 10:44:23',
                'end_time' => '2022-02-25 15:44:23',
                'recurrence' => 'weekly',
                'created_at' => '2022-01-25 07:52:29',
                'updated_at' => '2022-01-25 07:52:29',
                'deleted_at' => NULL,
                'event_id' => 5,
            ),
        ));
        
        
    }
}