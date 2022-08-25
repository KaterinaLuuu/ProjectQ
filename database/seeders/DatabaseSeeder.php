<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TagsSeeder::class,
            ImageSeeder::class,
            BannerSeeder::class,
            ArticleSeeder::class,
            CarBodySeeder::class,
            CarClassSeeder::class,
            CarEngineSeeder::class,
            CategorySeeder::class,
            CarSeeder::class,
        ]);
    }
}
