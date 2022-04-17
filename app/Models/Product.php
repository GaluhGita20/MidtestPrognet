<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table="products";
    protected $fillable=[
        'product_name',
        'price',
        'category_id',
        'gambar',
        'product_rate',
        'stock',

    ];
    protected $primaryKey = 'id';
    protected $casts = ['price' => 'integer', 'stock' => 'integer','product_rate' => 'double'];
    

    public function product_category(){
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function detail_packages(){
        return $this->hasMany('App\Models\DetailPackage', 'product_id');
    }

}
