<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'tblproduct';

    protected $primaryKey = 'token'; // Specify the custom primary key field (token)

    public function images()
    {
        return $this->hasMany(Image::class, 'token', 'token');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'catid', 'id');
    }


    public function carts()
    {
        return $this->hasMany(Cart::class, 'token', 'token');
    }

    public function getPriceAttribute($value)
    {
        return number_format($value, 2);
    }
}
