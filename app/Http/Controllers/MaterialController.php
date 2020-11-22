<?php

namespace App\Http\Controllers;

use App\Material;
use App\Traits\DeleteItemTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MaterialController extends Controller
{
    use DeleteItemTrait;
    private $material;
    public function __construct(Material $material)
    {
        $this->material=$material;
    }
    public function index(){
        $materials=$this->material->paginate(5);
        return view('Admin.Material.index',compact('materials'));
    }
    public function create(){
        return view('Admin.Material.add');
    }
    public function store(Request $request){
        DB::beginTransaction();
        try {
            $data=array();
            $data['name']=$request->name;
            $this->material->create($data);
            DB::commit();
            return redirect()->route('material.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message:'.$exception->getMessage().'Line'.$exception->getLine());
        }
    }
    public function edit($id){
        $materialEdit=$this->material->find($id);
        return view('Admin.Material.edit',compact('materialEdit'));
    }
    public function update(Request $request){
        DB::beginTransaction();
        try {
            $data=array();
            $data['name']=$request->name;
            $this->material->find($request->id)->update($data);
            DB::commit();
            return redirect()->route('material.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message:'.$exception->getMessage().'Line'.$exception->getLine());
        }
    }
    public function delete($id){
        DB::table('product_materials')->where('material_id',$id)->delete();
        return $this->deleteItem($this->material,$id);
    }
}
