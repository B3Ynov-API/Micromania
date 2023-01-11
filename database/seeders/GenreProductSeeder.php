<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Genre;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenreProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [];
        for($i = 0; $i < fake()->randomDigitNotNull; $i++){
            array_push($rows, [
                'genre_id' => fake()->randomElement(Genre::all())['id'],
                'product_id' => fake()->randomElement(Product::all())['id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        DB::table('genre_product')->insert($rows);
    }
}
