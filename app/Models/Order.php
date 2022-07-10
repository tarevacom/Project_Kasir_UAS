<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    public function cartproduct()
    {
        return $this->hasMany(Product::class, 'id');
    }
    protected $guarded = ['id'];
}