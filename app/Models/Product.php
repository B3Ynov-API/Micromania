<?php

namespace App\Models;

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
}
