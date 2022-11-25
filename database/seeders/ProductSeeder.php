<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
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
            ->hasAttached(Purchase::factory(fake()->randomDigit()),
                function(){
                    return 
                    [
                        'quantity' => fake()->randomDigitNotNull(),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]
                    ;},
                )
            //->hasPurchases(fake()->randomDigit())
            ->create();
    }
}
