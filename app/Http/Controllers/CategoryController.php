<?php

namespace App\Http\Controllers;

use App\Category;
use App\Traits\DeleteItemTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use DeleteItemTrait;
    use StorageImageTrait;
    private $category;
    public function __construct(Category $category)
    {
        $this->category=$category;
    }
    public function index(){
        $categories=$this->category->paginate(5);
        return view('Admin.Category.index',compact('categories'));
    }
    public function create(){
        return view('Admin.Category.add');
    }
    public function store(Request $request){
        DB::beginTransaction();
        try {
            $dataCategory=array();
            $dataCategory['name']=$request->name;
            $dataCategory['slug']=Str::slug($request->name);
            $dataImage=$this->storageTraitUpload($request,'image','Category');
            if(!empty($dataImage)){
                $dataCategory['image']=$dataImage['file_path'];
            }
            $this->category->create($dataCategory);
            DB::commit();
            return redirect()->route('category.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message:'.$exception->getMessage().'Line'.$exception->getLine());
        }
    }
    public function edit($id){
        $categoryEit=$this->category->find($id);
        return view('Admin.Category.edit',compact('categoryEit'));
    }
    public function update(Request $request){
        DB::beginTransaction();
        try {
            $dataCategory=array();
            $dataCategory['name']=$request->name;
            $dataCategory['slug']=Str::slug($request->name);
            $dataImage=$this->storageTraitUpload($request,'image','Category');
            if(!empty($dataImage)){
                $dataCategory['image']=$dataImage['file_path'];
            }
            $this->category->find($request->id)->update($dataCategory);
            DB::commit();
            return redirect()->route('category.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message:'.$exception->getMessage().'Line'.$exception->getLine());
        }
    }
    public function delete($id){
        $cates= $this->category->find($id);
        $products = $cates->getProductCate()->get();
        foreach ($products as $value){
            $this->deleteProduct($value->id);
            $value->delete();
        }
        return $this->deleteItem($this->category,$id);
    }
}
