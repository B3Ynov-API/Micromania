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
        'price',
        'category_id',
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

    public function scopeFilter($q)
    {
        if (request('searchName')) {
            $q->where('name', 'like', '%' . request('searchName', '') . '%');
        }
        if ((request('searchPriceMin') > 0 || request('searchPriceMin') === 0) && request('searchPriceMax') > 0) {
            $q->whereBetween('price', [request('searchPriceMin'), request('searchPriceMax')]);
        }
        if (request('searchCategory')) {
            $q->where('category_id', 'like', '%' . request('searchCategory', '') . '%');
        }
        if (request('searchPegi')) {
            $q->where('pegi_id', request('searchPegi'));
        }
        if (request('searchGenre')) {
            $q->whereRelation('genres', 'genre_id', request('searchGenre'));
        }

        return $q;
    }
}
