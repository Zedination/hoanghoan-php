<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
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
}
