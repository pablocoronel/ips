<?php

use Illuminate\Database\Seeder;

class NationalityTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('nationality')->delete();
        
        \DB::table('nationality')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nationality' => 'argentina',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nationality' => 'brasil',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nationality' => 'uruguay',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nationality' => 'chile',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'nationality' => 'paraguay',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'nationality' => 'bolivia',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}