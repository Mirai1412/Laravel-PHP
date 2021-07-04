<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Bulletin Board</title>
        <style>
     body{
         margin: 0 auto;
     }
     .flex2{
         margin:10px;
     }
     h1{

     }
     div.bg{
         width: 800px;
         padding: 0;
         width: 300px;
     }
     div.p-16{
        padding: 0;
        margin: 0;
     }
     div.grid{
         margin-bottom: 5px;
     }
        </style>
 </head>
<body>
    <h1>게시판</h1>
    @foreach ($posts as $post)
    <div class="p-16">
        <div class="grid md:grid-cols-2 sm:grid-cols-1 lg:grid-cols-3 m-5 mb-10">
                <div class="bg-white overflow-hidden hover:bg-green-100 border border-gray-200 p-3">
            <div class="m-2 text-justify text-sm">
                <p class="text-right text-xs"> {{  $post-> created_at }}</p>
                <span>
                    <a href="{{route('posts.show', $post->id) }}">제목 : {{ $post->title }}</a>
                </span>
                <div class="box2">
                    {{  $post->content }}
                </div>
                <div class="w-full text-right mt-4">
                    <a class="text-green-400 uppercase font-bold text-sm" href="#">Read More</a>
                  </div>
            </div>
        </div>
        </div>
    </div>
      @endforeach
      @auth<!-- 현재로그인한 사용자만 보이게한다.-->
      <a href="/posts/create">
          <button type="submit" class="border-2 border-blue-500 rounded-lg font-bold text-blue-500 px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white mr-6">Creating a Post</button>
      </a>
      @endauth
      <a href="{{route('dashboard')}}">
          <button type="submit" class="border-2 border-blue-500 rounded-lg font-bold text-blue-500 px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white mr-6"> Dashboard</button>
      </a>
          <div>
              {{ $posts->links()}}
          </div>
    {{-- <div class="container">
        <ul>
            @foreach ($posts as $post)
            <li>
                <div class="box">

                    <span>
                        <a href="{{route('posts.show', $post->id) }}">제목 : {{ $post->title }}</a>
                    </span>

                    <div class="box2">
                        {{  $post->content }}
                    </div>

                    <span>작성시간
                        {{  $post-> created_at }}</span>
                    <hr></div>
                </li>
                @endforeach
            </ul>
               @auth<!-- 현재로그인한 사용자만 보이게한다.-->
        <a href="/posts/create">
            <button type="submit" class="border-2 border-blue-500 rounded-lg font-bold text-blue-500 px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white mr-6">Creating a Post</button>
        </a>
        @endauth
        <a href="{{route('dashboard')}}">
            <button type="submit" class="border-2 border-blue-500 rounded-lg font-bold text-blue-500 px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white mr-6"> Dashboard</button>
        </a>
            <div>
                {{ $posts->links()}}
            </div>
        </div> --}}
    </body>
</html>
