<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\AddProductRequest;
use App\Material;
use App\ProductImage;
use App\Products;
use GuzzleHttp\Client;
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
//            $sender = new FcmService("AIzaSyDNITRMjPnUsnGFbfKCWCWJ2mdXWcVe6rE");
//            if($deviceTokens!=null&&count($deviceTokens)>0){
//                PushNotificationJob::dispatch('sendBatchNotification', [
//                    $deviceTokens,
//                    [
//                        'topicName' => 'new_product',
//                        'title' => 'Bạn ơi, có sản phẩm mới, hãy vào xem ngay!',
//                        'body' => $request->name,
//                        'image' => 'https://fallbacks.carbonads.com/nosvn/fallbacks/dabf8eec0afae2a669e68d8dc1092605.jpg'
//                    ],
//                ]);
//            }
//            $data = array('topicName' => 'new_product',
//                'title' => 'Bạn ơi, có sản phẩm mới, hãy vào xem ngay!',
//                'body' => $request->name,
//                'image' => 'https://fallbacks.carbonads.com/nosvn/fallbacks/dabf8eec0afae2a669e68d8dc1092605.jpg');
//            $sender->sendBatchNotification($deviceTokens,$data);
            $content = $request->name;
            $url = asset('shop/product_detail/'.$dataProduct['slug'].'/'.$pro->id);
            $image = empty($dataFeatureImage) ? "https://i.pinimg.com/originals/b0/3a/29/b03a295fdbe6094acccf7f021b986d8c.jpg" : 'storage/product/1/'.$dataFeatureImage['file_path'];
            $this->sendSimpleNotification($content, $url,$image);
            return redirect()->route('product.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message:'.$exception->getMessage().'Line'.$exception->getLine());
            dd($exception);
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

    public function sendSimpleNotification($content, $url, $image){
        $data = [
            "content" => $content,
            "url" => $url,

            "image" => $image
        ];
        try {
            $client = new Client();
            $result = $client->request('POST', 'http://localhost:8080/send-notification', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => $data,
                'timeout' => 3000,
            ]);
        } catch (Exception $e) {
            Log::debug($e);
        }
        return $result->getBody();
    }
}
