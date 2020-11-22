<?php

namespace App\Http\Controllers;

use App\Partner;
use App\Traits\DeleteItemTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    use DeleteItemTrait;
    use StorageImageTrait;
    private $partner;
    public function __construct(Partner $partner)
    {
        $this->partner=$partner;
    }
    public function index(){
        $partners=$this->partner->paginate(5);
        return view('Admin.Partner.index',compact('partners'));
    }
    public function create(){
        return view('Admin.Partner.add');
    }
    public function store(Request $request){
        DB::beginTransaction();
        try {
            $dataPartner =array();
            $dataPartner['name']=$request->name;
            $dataPartner['slug']= Str::slug($request->title);
            $dataPartner['content']=$request->contents;
            $dataPartner['description']=$request->description;
            $dataImage=$this->storageTraitUpload($request,'image','Partner');
            if(!empty($dataImage)){
                $dataPartner['image']=$dataImage['file_path'];
            }
            $this->partner->create($dataPartner);
            DB::commit();
            return redirect()->route('partner.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message:'.$exception->getMessage().'Line'.$exception->getLine());
        }
    }
    public function edit($id){
        $partnerEit = $this->partner->find($id);
        return view('Admin.Partner.edit',compact('partnerEit'));
    }
    public function update(Request $request){
        DB::beginTransaction();
        try {
            $dataPartner =array();
            $dataPartner['name']=$request->name;
            $dataPartner['slug']= Str::slug($request->title);
            $dataPartner['content']=$request->contents;
            $dataPartner['description']=$request->description;
            $dataImage=$this->storageTraitUpload($request,'image','Partner');
            if(!empty($dataImage)){
                $dataPartner['image']=$dataImage['file_path'];
            }
            $this->partner->find($request->id)->update($dataPartner);
            DB::commit();
            return redirect()->route('partner.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message:'.$exception->getMessage().'Line'.$exception->getLine());
        }
    }
    public function delete($id){
        return $this->deleteItem($this->partner,$id);
    }
}
