<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $guarded=[];
    public function getProductImage(){
        return $this->hasMany(ProductImage::class,'product_id');
    }
    public function getMaterial(){
        return $this->belongsToMany(Material::class,'product_materials','product_id','material_id');
    }
    public function getCategory(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
