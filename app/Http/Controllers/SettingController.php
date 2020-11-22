<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Traits\DeleteItemTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    private $setting;
    use StorageImageTrait;
    use DeleteItemTrait;
    public function __construct(Setting $setting)
    {
        $this->setting=$setting;
    }
    public function index(){
        $allSettings=$this->setting->paginate(5);
        return view('Admin.Setting.index',compact('allSettings'));
    }
    public function create(){
        return view('Admin.Setting.add');
    }
    public function store(Request $request){
        DB::beginTransaction();
        try {
            $dataSetting =array();
            $dataSetting['name']=$request->name;
            $dataSetting['email']=$request->email;
            $dataSetting['phone']=$request->phone;
            $dataSetting['address']=$request->address;
            $dataSetting['facebook']=$request->facebook;
            $dataImage=$this->storageTraitUpload($request,'logo','Setting');
            if(!empty($dataImage)){
                $dataSetting['logo']=$dataImage['file_path'];
            }
            $this->setting->create($dataSetting);
            DB::commit();
            return redirect()->route('setting.index');

        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message:'.$exception->getMessage().'Line'.$exception->getLine());
        }
    }
    public function edit($id){
        $settingEit = $this->setting->find($id);
        return view('Admin.Setting.edit',compact('settingEit'));
    }
    public function update(Request $request){
        DB::beginTransaction();
        try {
            $dataSetting =array();
            $dataSetting['name']=$request->name;
            $dataSetting['email']=$request->email;
            $dataSetting['phone']=$request->phone;
            $dataSetting['address']=$request->address;
            $dataSetting['facebook']=$request->facebook;
            $dataImage=$this->storageTraitUpload($request,'logo','Setting');
            if(!empty($dataImage)){
                $dataSetting['logo']=$dataImage['file_path'];
            }
            $this->setting->find($request->id)->update($dataSetting);
            DB::commit();
            return redirect()->route('setting.index');

        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message:'.$exception->getMessage().'Line'.$exception->getLine());
        }
    }
    public function delete($id){
        return $this->deleteItem($this->setting,$id);
    }
}
