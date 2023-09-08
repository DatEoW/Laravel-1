<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class tin extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='tin';
    protected $primaryKey='id';
    protected $date=['ngayDang'];
    protected $fillable=[
        'tieuDe',
        'tomTat',
        'urlHinh',
        'ngayDang',
        'noiDung',
        'idLT',
        'xem',
        'noiBat',
        'anHien',
        'tags',
        'lang',
    ];
}
