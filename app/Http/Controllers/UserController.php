<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
class UserController extends Controller
{
    public function user(){
        $data=DB::table('users')
        ->where('deleted_at','=',null)
        ->orderBy('id','desc')
        ->get();

        return view('/admin/user',compact('data'));
    }
    public function xoau($id){

        $t=User::find($id);
        $t->delete();

        return redirect('/admin/user')->with('status','Đã bỏ vào thùng rác');

    }
    public function thungracu(){
        $data= User::onlyTrashed()->get();

        return view('/admin/thungracu',compact('data'));

    }
    public function khoiphucu($id){
        $data=User::onlyTrashed()->where('id','=',$id);
        $data->restore();
        return redirect('/admin');
    }
    public function xoaluonu($id){
        $data=User::onlyTrashed()->where('id','=',$id);
        $data->forceDelete();
        return redirect('/admin');
    }
}
