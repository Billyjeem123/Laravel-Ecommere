<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'tblcarts';



    public function products()
    {
        return $this->hasMany(Product::class, 'token', 'token');
    }

  
    public function productImages()
    {
        return $this->hasMany(Image::class, 'token', 'token');
    }
}
