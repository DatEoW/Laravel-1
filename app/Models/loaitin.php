<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class loaitin extends Model
{
    use HasFactory;
    protected $table='loaitin';
    protected $primaryKey='id';

    protected $fillable=[
        'ten',
        'anHien'
    ];

}
