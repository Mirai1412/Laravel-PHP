<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function __construct()//생성자
    {
    $this->middleware(['auth'])->except([/*적용을 예외로 할것*/'index','show']);
    //이안에있는 모든 라우터들은 auth미들웨어가 적용된다.
    }

    public function show(Request $request, $id){
      //  dd($request->page);
        $page = $request->page;
        $post = Post::find($id);

        return view('posts.show',compact('post', 'page'));
    }

    public function index(){
        //$posts = Post::orderBy('created_at','desc')->get();//몇분전에 입력된는지 최신순 정렬
        // return $posts;
        $posts = Post::latest()->paginate(5);//글은 5개까지 작성이가능하다.
         //dd($posts); 안에 내용을볼수있다.
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
            'content' => 'required',
            'imageFile'=>'image | max:2000'

        ]);//오류메세지

        //dd($request);

        //DB 저장
        $post = new Post();
        $post->title = $title;
        $post->content = $content;
        $post->user_id = Auth::user()->id;//user객체에 접근

        //File 처리
        //내가원하는 파일시스템 상의 위치에 원하는 이름으로
        //파일을 저장하고
        if($request->file('imageFile')){
        $name  = $request->file('imageFile')->getClientOriginalName();
        //$request->file('imageFile')->stireAs('images',$fileName);
        //space.jpg
        //space.123dlacoghks.jpg 로 바꾸고싶다
        $extension = $request->file('imageFile')->extension();
        $nameWithoutExtension = Str::of($name)->basename('.' .$extension);
        $fileName =  $nameWithoutExtension.'.'.time().'.'.$extension;
        //dd($fileName);
        //파일 이름을 컬럼에 설정
        $request->file('imageFile')->storeAs('images',$fileName);
        $post->image = $fileName;
        }

        $post->save();

        //결과 뷰를 반환

        return redirect('/posts/index');// post는 redirect으로 처리한다.

    }
}
