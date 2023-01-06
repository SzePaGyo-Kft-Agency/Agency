<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class UserController extends Controller
{
    public function index(){
        $users = response()->json(User::all());
        return $users;
    }
    public function show($id){
        $users=response()->json(User::find($id));
        return $users;
    }
    public function destroy($id){
        User::find($id)->delete();
    }
    public function store(Request $request){
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->vip=$request->vip;
        $user->save();
    }
    public function update(Request $request,$id){
        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->vip=$request->vip;
        $user->save();
    }
    public function updateName(Request $request,$id){
        $validator=Validator::make($request->all(),["name"=>array('string','required','regex:/(^[A-Z][a-z]++[A-Z][a-z]+')]);
        if($validator->fails()){
            return response()->json(["message"=>$validator->errors()->all()],400);
        }
        $user=User::where("id",$id)->update(["name"=>Hash::make($request->name),]);
        return response()->json(["user"=>$user]);
    }
}
