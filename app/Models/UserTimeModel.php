<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Auth;


class UserTimeModel extends Model
{
    use HasFactory;
    protected $table = 'user_time';

    public static function getDetail($weekid){
        return self::where('week_id','=', $weekid)->where('user_id', Auth::user()->id)->first();
    }
}
