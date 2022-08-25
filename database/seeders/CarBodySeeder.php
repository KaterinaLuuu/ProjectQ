<?php

namespace Database\Seeders;

use App\Models\CarBody;
use Illuminate\Database\Seeder;

class CarBodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bodyNames = ['Седан', 'Универсал', 'Хэтчбек', 'Лифтбек', 'Лимузин', 'Внедорожник', 'Кроссовер', 'Стретч',
            'Купе', 'Кабриолет', 'Родстер', 'Тарга', 'Пикап', 'Фургон', 'Минивэн'];
        foreach ($bodyNames as $bodyName) {
            CarBody::factory()->create(["name" => $bodyName]);
        }
    }
}
