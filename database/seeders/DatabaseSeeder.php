<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\PurchaseSeeder;
use Illuminate\Support\Facades\DB;

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
            CategorySeeder::class,
            GenreSeeder::class,
            PegiSeeder::class,
            ProductSeeder::class,
            PurchaseSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            GenreProductSeeder::class,
        ]);
    }
}
