<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index(){
     //   $posts = Post::orderBy('created_at','desc')->get();//몇분전에 입력된는지 최신순 정렬
        // return $posts;
        $posts = Post::latest()->paginate(5);//글은 5개까지 작성이가능하다.
        return view('posts.index',['posts'=>$posts]);

    }


    public function create(){
      //  dd('OK'); //이안에 넣는 내용을 넣고 죽어라
        return view('posts.create');
    }
    
    public function store(Request $request){
    //$request->input['title'];
    //전송할때 화살표로
    //$request->input['content']; //form값이 title이랑 contentdlek
    
        $title = $request->title;
        $content = $request->content;

        $request->validate([
            'title' => 'required | min:3',
            'content' => 'required'
        ]);//오류메세지

        //dd($request);

        //DB 저장
        $post = new Post();
        $post->title = $title;
        $post->content = $content;
        $post->user_id = Auth::user()->id;//user객체에 접근
        $post->save();
        // 결과 뷰를 반환
        return redirect('/posts/index');// post는 redirect으로 처리한다.
        
    }
}
