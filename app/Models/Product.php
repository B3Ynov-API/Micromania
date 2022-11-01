<?php

namespace App\Models;

use App\Models\Pegi;
use App\Models\Genre;
use App\Models\Category;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function purchases()
    {
        return $this->belongsToMany(Purchase::class)->withPivot('quantity');
    }

    public function pegi()
    {
        return $this->belongsTo(Pegi::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
