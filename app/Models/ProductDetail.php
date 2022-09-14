<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'title', 'total_items', 'description'];

    // public function productDetail(){
    //     return $this->belongsTo(Product::class);
    // }
}
