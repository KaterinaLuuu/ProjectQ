<?php

namespace Database\Seeders;

use App\Models\CarClass;
use Illuminate\Database\Seeder;

class CarClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classNames = ['Picanto', 'Rio', 'Rio X', 'Ceed', 'Ceed SW', 'Cerato', 'K5', 'Stinger',
            'K900', 'Soul', 'Seltos', 'XCeed', 'Sportage', 'Новый Sportage', 'Sorento', 'Mohave', 'Carnival'];
        foreach ($classNames as $className) {
            CarClass::factory()->create(["name" => $className]);
        }
    }
}
