<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Pegi;
use App\Models\Genre;
use App\Models\Product;
use App\Models\Category;
use App\Models\Purchase;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Factories\GenresProductsFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(10)
            ->hasAttached(
                Purchase::factory(fake()->randomDigit()),
                function () {
                    return
                        [
                            'quantity' => fake()->randomDigitNotNull(),
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ];
                },
            )
            ->recycle(Category::all())
            ->recycle(Pegi::all())
            ->create();
    }
}
