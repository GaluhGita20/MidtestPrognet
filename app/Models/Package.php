<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $table="packages";
    protected $fillable=[
        'name',
        'normal_price',
        'end_price',
        'gambar',

    ];
    protected $primaryKey = 'id';
    protected $casts = ['normal_price' => 'integer', 'end_price' => 'integer'];
    

    public function detail_packages(){
        return $this->hasMany('App\Models\DetailPackage', 'package_id');
    }
}
