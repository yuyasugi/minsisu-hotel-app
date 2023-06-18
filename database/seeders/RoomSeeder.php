<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'name' => 'スタンダード',
            'number_of_rooms' => '5',
            'comment' => '大きな窓の向こうには庭園と芦ノ湖、箱根の雄大な山々が広がっております。椅子を置いたテラスを設け、手入れの行き届いた大庭園に直接出られます。',
        ]);

        Room::create([
            'name' => 'スタンダードツイン',
            'number_of_rooms' => '3',
            'comment' => '大庭園と芦ノ湖、その向こうに悠然と佇む富士山を一望。そんな景色にもしっくりなじむ、洗練された設備と厳選された調度が本物の醍醐味を奏でます。山のホテルを存分に味わえる部屋でゆったりとした芦ノ湖ステイをお楽しみください。',
        ]);

        Room::create([
            'name' => 'スタンダードトリプル',
            'number_of_rooms' => '3',
            'comment' => 'セミダブルベッド3台を設え、ご家族はもちろん、親しいお仲間同士でもご利用いただけます。洗練された落ち着きある空間で上質なひとときをお過ごしください。',
        ]);
    }
}
