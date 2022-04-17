<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPackage extends Model
{
    use HasFactory;
    protected $table="detail_packages";
    protected $fillable=[
        'product_id',
        'package_id',
        'qty',
        'sub_total',

    ];
    protected $primaryKey = 'id';
    protected $casts = ['qty' => 'integer', 'sub_total' => 'integer'];
    

    public function package(){
        return $this->belongsTo(Package::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
