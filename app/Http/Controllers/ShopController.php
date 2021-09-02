<?php

namespace App\Http\Controllers;

use App\About;
use App\Article;
use App\Banner;
use App\Category;
use App\Contact;
use App\Http\Requests\ContactRequest;
use App\Partner;
use App\Products;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index(){
        $banner= Banner::all();
        $product_hot=Products::take(8)->orderBy('views_detail','DESC')->get();
        $categories =Category::take(8)->get();
        $article=Article::latest()->take(4)->get();
        $partner=Partner::all();
        $setting = Setting::all();
        return view('Shop.shop',compact('banner','product_hot','categories','article','partner','setting'));
    }
    public function contact(){
        $banners= Banner::all();
        return view('Shop.contact',compact('banners'));
    }
    public function contactPost(ContactRequest $request){
        $dataContact= array();
        $dataContact['name']=$request->name;
        $dataContact['email']=$request->email;
        $dataContact['phone']=$request->phone;
        $dataContact['content']=$request->contents;
        Contact::create($dataContact);
        return redirect()->to('/');
    }
    public function partner(){
        $banners= Banner::all();
        $partner= Partner::paginate(4);
        return view('Shop.partner',compact('banners','partner'));
    }
    public function article(){
        $data = Article::paginate(6);
        return view('Shop.article',compact('data'));
    }
    public function article_detail($slug,$id){
        $article= Article::where(['slug'=> $slug , 'id'=>$id])->first();
        $new_article=Article::latest()->paginate(5);
        return view('Shop.article_detail',compact('article','new_article'));
    }
    public function product(){
        $banners = Banner::all();
        $categories = Category::take(4)->get();
        return view('Shop.product',compact('banners','categories'));
    }
    public function allProductByCategory($slug,$id){
        $banners= Banner::all();
        $category = Category::find($id);
        return view('Shop.allProductByCate',compact('banners','category'));
    }
    public function about(){
        $banners= Banner::all();
        $about =About::all();
        return view('Shop.about',compact('banners','about'));
    }
    public function product_detail($slug,$id){
        $product= Products::find($id);
        $views_detail=$product->views_detail + 1;
        Products::find($id)->update(['views_detail'=>$views_detail]);
        $cate= $product->getCategory()->first();
        $product_pr =Products::where('category_id',$cate->id)->take(4)->orderBy('views_detail','DESC')->get();
        return view('Shop.productDetail',compact('product','product_pr'));
    }
}
