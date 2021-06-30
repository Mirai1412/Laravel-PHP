<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create(){
      //  dd('OK'); //이안에 넣는 내용을 넣고 죽어라
        return view('posts.create');
    }
    public function store(Request $request){
    //$request->input['title'];
    //전송할때 화살표로
    //$request->input['content'];//form값이 title이랑 contentdlek
        $title = $request->title;
        $content = $request->content;
    
        dd($request);

        //DB 저장
        // 결과 뷰를 반환

    }
}
