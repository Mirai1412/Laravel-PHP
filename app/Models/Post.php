<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function imagePath(){
        // $path = '/storage/images/';
        $path = env('IMAGE_PATH', '/storage/images/');
        $imageFile = $this->image ?? 'no.png';
        return $path.$imageFile;
    }

    public function user(){
        return $this->belongsTo(User::class);//조인을 해서 어쩌고저쩌고한다
    }

    public function viewers(){
    return $this->belongsToMany(User::class/*,'post_user','post_id','user_id','id','id','users'*/);//뒤에 더 적지않아도 알아서 조인을 해준다.
    }
}
