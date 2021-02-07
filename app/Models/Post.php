<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class,'user_id','id') ;
    }
    public function islike(){
        $like= $this->hasOne(PostLike::class,'post_id','id')->where('user_id','=',auth()->id())->get();
        if (is_null($like)){
            return false;
        }else{
            return empty($like);
        }
    }

}
