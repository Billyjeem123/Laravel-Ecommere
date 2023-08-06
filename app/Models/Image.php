<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $primaryKey = 'token'; // Specify the custom primary key field (token)


    public function product()
    {
        return $this->belongsTo(Product::class, 'token', 'token');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'token', 'token');
    }

}
