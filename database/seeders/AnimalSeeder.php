<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Animal;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Animal::create([
            'name' => 'もんちゃん',
            'image' => 'scottish.jpg',
            'breed' => '三毛猫',
            'personality' => 'びびり',
            'skill' => '名前を呼ぶとにゃーと返事をする',
            'user_id' => 4,
        ]);
    }
}
