<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\TinController;

use App\Http\Controllers\UserController;



Route::get('/',[TinController::class,'index']

);
Route::get('/tin/{id}',function($id=0){
    $tin = DB::table('tin')
        ->where('id','=',$id)
        ->first();

    $tint=DB::table('tin')

    ->orderBy('id','desc')
    ->limit(5)
    ->get();
    $tent=DB::table('tin')
    ->join('loaitin','tin.idLT','=','loaitin.id')
    ->select('tin.*','loaitin.ten as tenlt')
    ->where('tin.id','=',$id)
    ->first();
    $cmt=DB::table('binhluan')
    ->join('tin','tin.id','=','binhluan.idTin')
    ->select('binhluan.*')
    ->where('binhluan.idTin','=',$id)
    ->get();
    $data=['id'=>$id,'tin'=>$tin,'tint'=>$tint,'tent'=>$tent,'cmt'=>$cmt];
    return view('chitiet',$data);

});
Route::get('/cat/{id}',function($idLT=0){
    $listin=DB::table('tin')
    ->join('loaitin','tin.idLT','=','loaitin.id')
    ->select('tin.*','loaitin.ten as tenlt')
    ->where('tin.idLT',$idLT)
    ->get();
    $data=['idLt'=>$idLT,'listtin'=>$listin];
    if($idLT)
    return view('tintrongloai',$data);
});


////////-------------------------------------------------------------------------------------------
Route::prefix('admin')->group(function(){
    Route::get('/',[TinController::class,'index_admin'])->middleware('auth','Quantri');
    Route::get('/them',[TinController::class,'them']);
    Route::post('/them',[TinController::class,'them_']);
    Route::get('/xoa/{id}',[TinController::class,'xoa']);
    Route::get('/capnhat/{id}',[TinController::class,'capnhat']);
    Route::post('/capnhat/{id}',[TinController::class,'capnhat_']);

    Route::get('/an/{id}',[TinController::class,'an']);
    Route::get('/hien/{id}',[TinController::class,'hien']);
    Route::get('/thungrac',[TinController::class,'thungrac']);
    Route::get('/khoiphuc/{id}',[TinController::class,'khoiphuc']);
    Route::get('/xoaluon/{id}',[TinController::class,'xoaluon']);
    ///user
    Route::get('/xoau/{id}',[UserController::class,'xoau']);
    Route::get('/thungracu',[UserController::class,'thungracu']);
    Route::get('/khoiphucu/{id}',[UserController::class,'khoiphucu']);
    Route::get('/xoaluonu/{id}',[UserController::class,'xoaluonu']);
    Route::get('/user',[UserController::class,'user']);
});



require __DIR__.'/auth.php';
