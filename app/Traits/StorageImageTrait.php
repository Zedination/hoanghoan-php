<?php
namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StorageImageTrait{
    public function storageTraitUpload(Request $request,$fieldName,$foderName){
        if($request->hasFile($fieldName)){
            $file=$request->$fieldName;
            $fileNameOrigin =$file->getClientOriginalName();
            $fileNameHash= Str::random(20).'.'.$file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs('public/'.$foderName.'/'.auth()->id(),$fileNameHash);
            $dataUpload=[
                'file_name'=>$fileNameOrigin,
                'file_path'=>Storage::url($filePath)
            ];
            return $dataUpload;
        }
        return null;
    }
    public function storageTraitUploadMutiple($file,$foderName){
            $fileNameOrigin =$file->getClientOriginalName();
            $fileNameHash= Str::random(20).'.'.$file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/'.$foderName.'/'.auth()->id(),$fileNameHash);
            $dataUpload=[
                'file_name'=>$fileNameOrigin,
                'file_path'=>Storage::url($filePath)
            ];
            return $dataUpload;
    }
}
