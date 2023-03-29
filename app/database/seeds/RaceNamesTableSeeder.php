<?php

use Illuminate\Database\Seeder;

class RaceNamesTableSeeder extends Seeder
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
                'race_names' => 'フェブラリーステークス'
            ],
            [
                'race_names' => '高松宮記念'
            ],
            [
                'race_names' => '大阪杯'
            ],
            [
                'race_names' => '桜花賞'
            ],
            [
                'race_names' => '皐月賞'
            ],
            [
                'race_names' => '天皇賞（春）'
            ],
            [
                'race_names' => 'NHKマイルカップ'
            ],
            [
                'race_names' => 'ヴィクトリアマイル'
            ],
            [
                'race_names' => 'オークス'
            ],
            [
                'race_names' => '日本ダービー'
            ],
            [
                'race_names' => '安田記念'
            ],
            [
                'race_names' => '宝塚記念'
            ],
            [
                'race_names' => 'スプリンターズステークス'
            ],
            [
                'race_names' => '秋華賞'
            ],
            [
                'race_names' => '菊花賞'
            ],
            [
                'race_names' => '天皇賞（秋）'
            ],
            [
                'race_names' => 'エリザベス女王杯'
            ],
            [
                'race_names' => 'マイルチャンピオンシップ'
            ],
            [
                'race_names' => 'ジャパンカップ'
            ],
            [
                'race_names' => 'チャンピオンズカップ'
            ],
            [
                'race_names' => '阪神ジュベナイルフィリーズ'
            ],
            [
                'race_names' => '朝日杯フューチュリティステークス'
            ],
            [
                'race_names' => '有馬記念'
            ],
            [
                'race_names' => 'ホープフルステークス'
            ],
        ];
        foreach ($params as $param) {
            DB::table('race_names')->insert($param);
        }
    }
    }
