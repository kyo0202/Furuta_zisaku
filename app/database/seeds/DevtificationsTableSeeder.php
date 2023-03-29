<?php

use Illuminate\Database\Seeder;

class DevtificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                'place' => '札幌競馬場'
            ],
            [
                'place' => '函館競馬場'
            ],
            [
                'place' => '福島競馬場'
            ],
            [
                'place' => '新潟競馬場'
            ],
            [
                'place' => '中山競馬場'
            ],
            [
                'place' => '東京競馬場'
            ],
            [
                'place' => '中京競馬場'
            ],
            [
                'place' => '京都競馬場'
            ],
            [
                'place' => '阪神競馬場'
            ],
            [
                'place' => '小倉競馬場'
            ],
        ];
        foreach ($params as $param) {
            DB::table('place')->insert($param);
        }
    }
    }
