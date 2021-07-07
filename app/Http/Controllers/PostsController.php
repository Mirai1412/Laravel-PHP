<?php

namespace App\Http\Controllers;

use App\Models\Post;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function __construct()//생성자
    {
    $this->middleware(['auth'])->except([/*적용을 예외로 할것*/'index','show']);
    //이안에있는 모든 라우터들은 auth미들웨어가 적용된다.
    }

    public function edit(Request $request, Post $post)//생성자
    {   // 수정 폼 생성
        //$post = Post::find($id);
        //$post = Post::where('id',$id)->first();
        return view('posts.edit', ['post'=>$post,'page'=>$request->page]);

    }

    public function update(Request $request, $id)//생성자   //인젝션 받을 객체는 라우터파라미터 앞에 와야한다.
    {
        $request->validate([
            'title' => 'required | min:3',
            'content' => 'required',
            'imageFile'=>'image | max:2000'

        ]); // 글자수 제한 파일 용량제한

        $post = Post::find($id);
         // 이미지 파일 수정.파일시스템에서

        // Authorization. 즉 수정 권한이 있는지 검사
        // 즉, 로그인한 사용자와 게시글의 작성자가 같은지 체크

        if($request()->user()->cannot('update',$post)){
            abort(403);
                       }


        if($request->file('imageFile')){
            $imagePath = 'public/images/' .$post->image;
            Storage::delete($imagePath);
            $post->image = $this->uploadPostImage($request);
        }

        // 게시글을 데이터베이스에서 수정
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('post.show',['id'=> $id]);

    }

    protected function uploadPostImage($request){
        $name  = $request->file('imageFile')->getClientOriginalName();
        //$request->file('imageFile')->stireAs('images',$fileName);
        //space.jpg
        //space.123dlacoghks.jpg 로 바꾸고싶다
        $extension = $request->file('imageFile')->extension();
        $nameWithoutExtension = Str::of($name)->basename('.' .$extension);
        $fileName =  $nameWithoutExtension.'.'.time().'.'.$extension;
        //dd($fileName);
        //파일 이름을 컬럼에 설정
        $request->file('imageFile')->storeAs('public/images',$fileName);
        return $fileName;
    }

    public function destroy(Request $request,$id)//생성자
    {   // 파일 시스템에서 이미지 파일 삭제
        // 게시글을 데이터베이스에서 삭제해야한다.
        $post = Post::findOrFail($id); //id 를 받아서 하면 찾을수없어서 findOrFail을 사용

        // if(auth()->user()->id != $post->user_id){
        //     abort(403);
        // }
        if($request()->user()->cannot('delete',$post)){
 abort(403);
            }

        $page  = $request->page;
        if($post->image){
            $imagePath = 'public/images/'.$post->image;
            Storage::delete($imagePath);
        }

        $post->delete();

        return redirect()->route('posts.index',['page'=>$page]);
    }

    public function show(Request $request, $id){
      //  dd($request->page);
      //쿼리스트링으로 준것은 request로 받아야한다
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
            $post->image = $this->uploadPostImage($request);
        }

        $post->save();

        //결과 뷰를 반환

        return redirect('/posts/index');// post는 redirect으로 처리한다.

    }
}
