<?php

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            Category::insert([[
                'description' => 'Jeux-vidéo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'description' => 'Produit dérivé',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'description' => 'Console',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'description' => 'Jeu de carte à collectionner',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'description' => 'Carte prépayée',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            //
        });
    }
};
