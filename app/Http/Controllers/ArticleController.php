<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\AboutRequest;
use App\Traits\DeleteItemTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    private $article;
    use DeleteItemTrait;
    use StorageImageTrait;
    public function __construct(Article $article)
    {
        $this->article=$article;
    }
    public function index(){
        $articles=$this->article->paginate(5);
        return view('Admin.Ariticle.index',compact('articles'));
    }
    public function create(){
        return view('Admin.Ariticle.add');
    }
    public function store(Request $request){
        DB::beginTransaction();
        try {
            $dataArticle =array();
            $dataArticle['title']=$request->title;
            $dataArticle['slug']= Str::slug($request->title);
            $dataArticle['content']=$request->contents;
            $dataArticle['description']=$request->description;
            $dataImage=$this->storageTraitUpload($request,'image','Article');
            if(!empty($dataImage)){
                $dataArticle['image']=$dataImage['file_path'];
            }
            $this->article->create($dataArticle);
            DB::commit();
            return redirect()->route('article.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message:'.$exception->getMessage().'Line'.$exception->getLine());
        }
    }
    public function edit($id){
        $articleEit = $this->article->find($id);
        return view('Admin.Ariticle.edit',compact('articleEit'));
    }
    public function update(Request $request){
        DB::beginTransaction();
        try {
            $dataArticle =array();
            $dataArticle['title']=$request->title;
            $dataArticle['slug']= Str::slug($request->title);
            $dataArticle['content']=$request->contents;
            $dataArticle['description']=$request->description;
            $dataImage=$this->storageTraitUpload($request,'image','Article');
            if(!empty($dataImage)){
                $dataArticle['image']=$dataImage['file_path'];
            }
            $this->article->find($request->id)->update($dataArticle);
            DB::commit();
            return redirect()->route('article.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message:'.$exception->getMessage().'Line'.$exception->getLine());
        }
    }
    public function delete($id){
        return $this->deleteItem($this->article,$id);
    }
}
