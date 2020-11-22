<?php
namespace App\Traits;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

trait DeleteItemTrait{
    public function deleteItem($model,$id){
        try {
            $model->find($id)->delete();
            return response()->json([
                'code'=>200,
                'message'=>'success'
            ],200);
        }catch (\Exception $exception){
            Log::error('Message:'.$exception->getMessage().'Line'.$exception->getLine());
            return response()->json([
                'code'=>500,
                'message'=>'fail'
            ],500);
        }
    }
    public function deleteProduct($id){
        DB::beginTransaction();
        try {
            DB::table('product_images')->where('product_id',$id)->delete();
            DB::table('product_materials')->where('product_id',$id)->delete();
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            dd('Message:'.$exception->getMessage().'Line'.$exception->getLine());
            Log::error('Message:'.$exception->getMessage().'Line'.$exception->getLine());
        }
    }
}
