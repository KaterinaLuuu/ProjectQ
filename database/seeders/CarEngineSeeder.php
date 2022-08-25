<?php

namespace Database\Seeders;

use App\Models\CarEngine;
use Illuminate\Database\Seeder;

class CarEngineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $engineNames = ['Рядный', 'V-образный', 'Оппозитный', 'Роторный',
            'Бензиновый', 'Дизельный', 'Газовый', 'Гибридный'];
        foreach ($engineNames as $engineName) {
            CarEngine::factory()->create(["name" => $engineName]);
        }
    }
}
