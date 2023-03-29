<?php

use Illuminate\Database\Seeder;

class PlaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params =[
        [
            'devtifications' => '単勝'
        ],
        [
            'devtifications' => '複勝'
        ],
        [
            'devtifications' => 'ワイド'
        ],
        [
            'devtifications' => '馬連'
        ],
        [
            'devtifications' => '馬単'
        ],
        [
            'devtifications' => '三連複'
        ],
        [
            'devtifications' => '3連単'
        ],
    ];
    foreach($params as $param){
        DB::table('devtifications')->insert($param);
    }
    }
}
