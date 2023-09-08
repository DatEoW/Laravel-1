<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Middleware\Quantri;
use DB;
use App\Models\tin;
use App\Models\loaitin;
use Illuminate\Support\Str;


class TinController extends Controller
{

    public function tintrongloai($idLT=0){
        $data=['idLT'=>$idLT];
        return view('tintrongloai',$data);
    }
    public function index(){
        $tin=DB::table('tin')
        ->join('loaitin','tin.idLT','=','loaitin.id')
        ->select('tin.*','loaitin.ten as tenlt')
        ->orderBy('id','desc')
        ->limit(10)
        ->get();
        $lt_new=DB::table('tin')
        ->join('loaitin','tin.idLT','=','loaitin.id')
        ->select('tin.*','loaitin.ten as tenlt')
        ->orderBy('ngayDang','desc')
        ->skip(3)
        ->limit(2)
        ->get();
        $rd_new=DB::table('tin')
        ->join('loaitin','tin.idLT','=','loaitin.id')
        ->select('tin.*','loaitin.ten as tenlt')
        ->inRandomOrder()
        ->limit(2)
        ->get();
        $rd_new1=DB::table('tin')
        ->join('loaitin','tin.idLT','=','loaitin.id')
        ->select('tin.*','loaitin.ten as tenlt')
        ->orderBy(DB::raw('RAND()'))
        ->limit(2)
        ->get();
        $rd_new2=DB::table('tin')
        ->join('loaitin','tin.idLT','=','loaitin.id')
        ->select('tin.*','loaitin.ten as tenlt')
        ->orderBy(DB::raw('RAND()'))
        ->limit(2)
        ->get();
        $tin_xnn=DB::table('tin')
        ->join('loaitin','tin.idLT','=','loaitin.id')
        ->select('tin.*','loaitin.ten as tenlt')
        ->orderBy('xem','desc')
        ->first();
        $tin_xn=DB::table('tin')
        ->join('loaitin','tin.idLT','=','loaitin.id')
        ->select('tin.*','loaitin.ten as tenlt')
        ->orderBy('xem','desc')

        ->skip(1)
        ->limit(2)

        ->get();
        $tin_xn1=DB::table('tin')
        ->join('loaitin','tin.idLT','=','loaitin.id')
        ->select('tin.*','loaitin.ten as tenlt')
        ->orderBy('xem','desc')

        ->skip(3)
        ->limit(2)

        ->get();


        return view('home',compact('tin','lt_new','rd_new','rd_new1','rd_new2','tin_xnn','tin_xn','tin_xn1'));
    }
    public function tinchitiet(){

    }


    // admin ------------------------------------------------------------------------------------------------

    public function index_admin(){
        // $data=tin::orderBy('id','desc')->get();
        $data=DB::table('tin')
        ->join('loaitin','tin.idLT','=','loaitin.id')
        ->select('tin.*','loaitin.ten as tenlt')
        ->where('deleted_at','=',null)
        ->orderBy('id','desc')
        ->get();

        return view('/admin/index',compact('data'));
    }
    public function them(){
        return view('/admin/themtin');
    }
    public function them_(Request $req){
        $t= new Tin;
        $t->tieuDe=$_POST['tieuDe'];
        $t->tomTat=$_POST['tomTat'];

        $t->idLT=$_POST['idLT'];
        $req->validate([
            'img' => 'image|mimes:jpeg,jpg,png',
        ]);
        if ($req->hasFile('img')) {
            $img = $req->file('img');
            $destination = public_path('/upload/images/');
            dd($img);
            $ext = $img->getClientOriginalExtension();
            $fileName = $destination.'/'.Str::random(6). '_'. time(). $ext;
            $img->move($destination, $fileName);
            $t->urlHinh = $fileName;
        }



        $t->save();
        return redirect('/admin');
    }
    public function xoa($id){

        $t=tin::find($id);
        $t->delete();

        return redirect('/admin')->with('status','Đã bỏ vào thùng rác');

    }
    public function thungrac(){
        $data= tin::onlyTrashed()->get();
        
        return view('/admin/thungrac',compact('data'));

    }
    public function khoiphuc($id){
        $data=tin::onlyTrashed()->where('id','=',$id);
        $data->restore();
        return redirect('/admin');
    }
    public function xoaluon($id){
        $data=tin::onlyTrashed()->where('id','=',$id);
        $data->forceDelete();
        return redirect('/admin');
    }
    public function capnhat($id){
        $t=tin::find($id);
        $loaitin=loaitin::all();
        return view('/admin/capnhattin',compact('t','loaitin'));
    }
    public function capnhat_($id,Request $req){
        $t=tin::find($id);

        $t->tieuDe=$_POST['tieuDe'];
        $t->tomTat=$_POST['tomTat'];

        $t->noiDung=$_POST['noiDung'];
        $t->anHien=$_POST['anHien'];
        $t->idLT=$_POST['idLT'];
        $req->validate([
            'urlHinh' => 'image|mimes:jpeg,jpg,png',
        ]);
        if ($req->hasFile('urlHinh')) {
            $img = $req->file('urlHinh');
            $destination = public_path('/upload/images/');
            dd($img);
            $ext = $img->getClientOriginalExtension();
            $fileName = $destination.'/'.Str::random(6). '_'. time(). $ext;
            $img->move($destination, $fileName);
            $t->urlHinh = $fileName;
        }
        $t->save();
        return redirect('/admin');
    }
    public function an($id){
        $t=tin::find($id);
        $t->anHien=0;
        $t->save();
        return redirect('/admin')->with('status','Bạn đã ẩn tin:')->with('tieuDe',$t->tieuDe);
    }
    public function hien($id){
        $t=tin::find($id);
        $t->anHien=1;
        $t->save();
        return redirect('/admin')->with('status','Bạn đã hiện tin:')->with('tieuDe',$t->tieuDe);
    }


}
