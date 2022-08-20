<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CountrySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('country_list')->insert(
            [ 'country' => 'カナダ１０年', 'country_en' => 'Canada', 'flag_url' => 'canada.png']
        );
        DB::table('country_list')->insert(
            [ 'country' => 'アメリカ１０年', 'country_en' => 'USA', 'flag_url' => 'usa.png'],
        );
        DB::table('country_list')->insert(
            [ 'country' => 'オーストラリア１０年', 'country_en' => 'Australia', 'flag_url' => 'australia.png']
        );
        DB::table('country_list')->insert(
            [ 'country' => 'スイス２年',  'country_en' => 'Switzerland', 'flag_url' => 'switzerland.png']
        );
        DB::table('country_list')->insert(
            [ 'country' => 'ニュージー１０年',  'country_en' => 'NewZealand', 'flag_url' => 'newzealand.png'],
        );
        DB::table('country_list')->insert(
            [ 'country' => '日本１０年', 'country_en' => 'Japan', 'flag_url' => 'japan.png'],
        );
        DB::table('country_list')->insert(
            [ 'country' => 'ドイツ１０年', 'country_en' => 'Germany', 'flag_url' => 'german.png'],
        );
        DB::table('country_list')->insert(
            [ 'country' => 'フランス１０年', 'country_en' => 'France', 'flag_url' => 'france.png'],
        );
        DB::table('country_list')->insert(
            [ 'country' => 'イギリス１０年', 'country_en' => 'England', 'flag_url' => 'england.png'],
        );
        DB::table('country_list')->insert(
            [ 'country' => 'トルコ１０年', 'country_en' => 'Turkey', 'flag_url' => 'turkey.png']
        );
    }
}
