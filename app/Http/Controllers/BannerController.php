<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Traits\DeleteItemTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    private $banner;
    use DeleteItemTrait;
    use StorageImageTrait;
    public function __construct(Banner $banner)
    {
        $this->banner=$banner;
    }
    public function index(){
        $banners=$this->banner->paginate(5);
        return view('Admin.Banner.index',compact('banners'));
    }
    public function create(){
        return view('Admin.Banner.add');
    }
    public function store(Request $request){
        DB::beginTransaction();
        try {
            $dataBanner =array();
            $dataBanner['title']=$request->title;
            $dataBanner['slug']= Str::slug($request->title);
            $dataBanner['content']=$request->contents;
            $dataBanner['is_page']=$request->is_page;
            $dataImage=$this->storageTraitUpload($request,'image','Banner');
            if(!empty($dataImage)){
                $dataBanner['image']=$dataImage['file_path'];
            }
            $this->banner->create($dataBanner);
            DB::commit();
            return redirect()->route('banner.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message:'.$exception->getMessage().'Line'.$exception->getLine());
        }
    }
    public function edit($id){
        $bannerEit = $this->banner->find($id);
        return view('Admin.Banner.edit',compact('bannerEit'));
    }
    public function update(Request $request){
        DB::beginTransaction();
        try {
            $dataBanner =array();
            $dataBanner['title']=$request->title;
            $dataBanner['slug']= Str::slug($request->title);
            $dataBanner['content']=$request->contents;
            $dataBanner['is_page']=$request->is_page;
            $dataImage=$this->storageTraitUpload($request,'image','Banner');
            if(!empty($dataImage)){
                $dataBanner['image']=$dataImage['file_path'];
            }
            $this->banner->find($request->id)->update($dataBanner);
            DB::commit();
            return redirect()->route('banner.index');
        }catch (\Exception $exception){
            DB::rollBack();
            dd('Message:'.$exception->getMessage().'Line'.$exception->getLine());
            Log::error('Message:'.$exception->getMessage().'Line'.$exception->getLine());
        }
    }
    public function delete($id){
        return $this->deleteItem($this->banner,$id);
    }
}
