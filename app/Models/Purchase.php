<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        //
    ];

    protected $hidden = [
        'updated_at'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function scopeFilter($q)
    {
        if (request('searchProduct')) {
            $q->whereRelation('products', 'product_id', request('searchProduct', ''));
        }
        return $q;
    }
}
