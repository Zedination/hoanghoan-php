<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Traits\DeleteItemTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    use DeleteItemTrait;
    private $user;
    public function __construct(User $user)
    {
        $this->user=$user;
    }
    public function index(){
        $allUsers= $this->user->paginate(5);
        return view('Admin.User.index',compact('allUsers'));
    }
    public function create(){
        return view('Admin.User.add');
    }
    public function store(UserRequest $request){
        DB::beginTransaction();
        try {
            $userData['name']=$request->name;
            $userData['email']=$request->email;
            $userData['password']=Hash::make($request->password);
            $this->user->create($userData);
            DB::commit();
            return redirect()->route('user.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message:'.$exception->getMessage().'Line'.$exception->getLine());
        }
    }
    public function edit($id){
        $userEdit=$this->user->find($id);
        return view('Admin.User.edit',compact('userEdit'));
    }
    public function update(Request $request){
        DB::beginTransaction();
        try {
            $userData['name']=$request->name;
            $userData['email']=$request->email;
            $userData['password']=Hash::make($request->password);
            $this->user->find($request->id)->update($userData);
            DB::commit();
            return redirect()->route('user.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message:'.$exception->getMessage().'Line'.$exception->getLine());
        }
    }
    public function delete($id){
        $users= $this->user->find($id);
        $products = $users->getProducts()->get();
        foreach ($products as $value){
            $this->deleteProduct($value->id);
            $value->delete();
        }
        return $this->deleteItem($this->user,$id);
    }



}
