<?php

namespace App\Http\Controllers;

use App\About;
use App\Http\Requests\AboutRequest;
use App\Traits\DeleteItemTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    private $about;
    use DeleteItemTrait;
    use StorageImageTrait;
    public function __construct(About $about)
    {
        $this->about=$about;
    }
    public function index(){
        $abouts=$this->about->paginate(5);
        return view('Admin.About.index',compact('abouts'));
    }
    public function create(){
        return view('Admin.About.add');
    }
    public function store(AboutRequest $request){
        DB::beginTransaction();
        try {
            $dataAbout =array();
            $dataAbout['title']=$request->title;
            $dataAbout['slug']= Str::slug($request->title);
            $dataAbout['content']=$request->contents;
            $dataImage=$this->storageTraitUpload($request,'image','About');
            if(!empty($dataImage)){
                $dataAbout['image']=$dataImage['file_path'];
            }
            $this->about->create($dataAbout);
            DB::commit();
            return redirect()->route('about.index');
        }catch (\Exception $exception){
            DB::rollBack();
            dd('Message:'.$exception->getMessage().'Line'.$exception->getLine());
            Log::error('Message:'.$exception->getMessage().'Line'.$exception->getLine());
        }
    }
    public function edit($id){
        $aboutEit = $this->about->find($id);
        return view('Admin.About.edit',compact('aboutEit'));
    }
    public function update(Request $request){
        DB::beginTransaction();
        try {
            $dataAbout =array();
            $dataAbout['title']=$request->title;
            $dataAbout['slug']= Str::slug($request->title);
            $dataAbout['content']=$request->contents;
            $dataImage=$this->storageTraitUpload($request,'image','About');
            if(!empty($dataImage)){
                $dataAbout['image']=$dataImage['file_path'];
            }
            $this->about->find($request->id)->update($dataAbout);
            DB::commit();
            return redirect()->route('about.index');
        }catch (\Exception $exception){
            DB::rollBack();
            dd('Message:'.$exception->getMessage().'Line'.$exception->getLine());
            Log::error('Message:'.$exception->getMessage().'Line'.$exception->getLine());
        }
    }
    public function delete($id){
        return $this->deleteItem($this->about,$id);
    }
}
