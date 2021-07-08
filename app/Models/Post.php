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

}
