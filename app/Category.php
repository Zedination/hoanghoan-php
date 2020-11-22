<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded=[];
    public function getProductCate(){
        return $this->hasMany(Products::class,'category_id');
    }
}
