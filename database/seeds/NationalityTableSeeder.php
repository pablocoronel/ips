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
                'nationality' => 'argentina'
            ),
            1 => 
            array (
                'id' => 2,
                'nationality' => 'brasil'
            ),
            2 => 
            array (
                'id' => 3,
                'nationality' => 'uruguay'
            ),
            3 => 
            array (
                'id' => 4,
                'nationality' => 'chile'
            ),
            4 => 
            array (
                'id' => 5,
                'nationality' => 'paraguay'
            ),
            5 => 
            array (
                'id' => 6,
                'nationality' => 'bolivia'
            ),
        ));
        
        
    }
}