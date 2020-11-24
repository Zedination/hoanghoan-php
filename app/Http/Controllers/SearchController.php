<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function searchProduct(Request $request){
        $keyword = $request->input('q');

        $slug = Str::slug($keyword);
        $data = Products::where('slug','like','%'.$slug.'%')->get();
//        return response()->json(["result"=>$data]);
        return response()->json($data);
    }

    public function  subscribeNotification(Request $request){
        $token = $request->token;
        try{
            DB::table("device_tokens")->insert([
                "token" => $token,
                "subscribe" => 1
            ]);
        }catch (\Exception $exception){

        }
        return response()->json(["success" => true],200);
    }

}
