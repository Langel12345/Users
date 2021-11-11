<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function getUsers(){
        $user=User::select('*');
        
        return Datatables::of($user)->make(true);

    }
    public function deteleUser(request $request){
       
       
       $delete=DB::table('users')->where('id',$request->data)->delete();
    
        return response()->json(['correct',200]);
    }
    public function update(request $request){
        $update=User::where('id',$request->id)
            ->update([
                'name'=>$request->name,
                 'type_user'=>$request->type, 
                 'number'=>$request->number
            ]);
            return response()->json(['correct',200]);
    }
}
