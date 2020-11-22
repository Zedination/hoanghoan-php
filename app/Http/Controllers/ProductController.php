<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\AddProductRequest;
use App\Material;
use App\ProductImage;
use App\Products;
use App\Traits\DeleteItemTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use DeleteItemTrait;
    use StorageImageTrait;
    private $category;
    private $material;
    private $product;
    private $productImage;
    public function __construct(Products $product,Material $material,Category $category,ProductImage $productImage)
    {
        $this->productImage=$productImage;
        $this->product=$product;
        $this->material=$material;
        $this->category=$category;
    }
    public function index(){
        $products= $this->product->latest()->paginate(5);
        return view('Admin.Product.index',compact('products'));
    }
    public function create(){
        $categories= $this->category->all();
        $materials=$this->material->all();
        return view('Admin.Product.add',compact('categories','materials'));
    }
    public function store(AddProductRequest $request){
        DB::beginTransaction();
        try {
            $dataProduct= array();
            $dataProduct['name']=$request->name;
            $dataProduct['slug']=Str::slug($request->name);
            $dataProduct['price']=$request->price;
            $dataProduct['user_id']=auth()->id();
            $dataProduct['category_id']=$request->category_id;
            $dataProduct['content']=$request->contents;
            $dataProduct['views_detail']=0;
            $dataFeatureImage =$this->storageTraitUpload($request,'image','product');
            if(!empty($dataFeatureImage)){
                $dataProduct['image']=$dataFeatureImage['file_path'];
            }
            $pro =$this->product->create($dataProduct);
            //Insert data for ProductImage
            if($request->hasFile('image_path')){
                foreach ($request->image_path as $fileItem){
                    $dataProductImage=$this->storageTraitUploadMutiple($fileItem,'ProductImage');
                    $pro->getProductImage()->create([
                        'image'=>$dataProductImage['file_path']
                    ]);
                }
            }
            if(!empty($request->materials)){
               $pro->getMaterial()->attach($request->materials);
            }
            DB::commit();
            return redirect()->route('product.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message:'.$exception->getMessage().'Line'.$exception->getLine());
        }
    }
    public function edit($id){
        $categories= $this->category->all();
        $productEdit=$this->product->find($id);
        foreach($productEdit->getMaterial()->get() as $value){
           $ids[]=$value->id;
        }
        $materials=$this->material->whereNotIn('id',$ids)->get();
        return view('Admin.Product.edit',compact('productEdit','materials','categories'));
    }
    public function update(Request $request){
        DB::beginTransaction();
        try {
            $dataProduct= array();
            $dataProduct['name']=$request->name;
            $dataProduct['slug']=Str::slug($request->name);
            $dataProduct['price']=$request->price;
            $dataProduct['user_id']=auth()->id();
            $dataProduct['category_id']=$request->category_id;
            $dataProduct['content']=$request->contents;
            $dataFeatureImage =$this->storageTraitUpload($request,'image','product');
            if(!empty($dataFeatureImage)){
                $dataProduct['image']=$dataFeatureImage['file_path'];
            }
            $this->product->find($request->productId)->update($dataProduct);
            $pro=$this->product->find($request->productId);
            //insert data to product_images
            if($request->hasFile('image_path')){
                $this->productImage->where('product_id',$pro->id)->delete();
                foreach ($request->image_path as $fileItem){
                    $dataProductImage=$this->storageTraitUploadMutiple($fileItem,'ProductImage');
                    $pro->getProductImage()->create([
                        'image'=>$dataProductImage['file_path']
                    ]);
                }
            }
            //
            if(!empty($request->materials)){
                $pro->getMaterial()->sync($request->materials);
            }
            DB::commit();
            return redirect()->route('product.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message:'.$exception->getMessage().'Line'.$exception->getLine());
        }
    }
    public function delete($id){
       $this->deleteProduct($id);
       return $this->deleteItem($this->product,$id);
    }
}
