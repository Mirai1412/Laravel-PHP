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
        </style>
 </head>
<body>
    <div class="Creat">
        <h1>Bulletin Board</h1>
        @auth<!-- 현재로그인한 사용자만 보이게한다.-->
        <a href="/posts/create">
            <button type="submit" class="border-2 border-blue-500 rounded-lg font-bold text-blue-500 px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white mr-6">Creating a Post</button>
        </a>
        @endauth
        <a href="{{route('dashboard')}}">
            <button type="submit" class="border-2 border-blue-500 rounded-lg font-bold text-blue-500 px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white mr-6"> Dashboard</button>
        </a>
    </div>
    <!-- post card -->
        @foreach ($posts as $post)
    <div class="flex2 bg-white shadow-lg rounded-lg mx-4 md:mx-auto my-56 max-w-md md:max-w-2xl "><!--horizantil margin is just for display-->
    <div class="flex items-start px-4 py-6">
       <img class="w-12 h-12 rounded-full object-cover mr-4 shadow" src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="avatar">
       <div class="">
          <div class="flex items-center justify-between">
            <span>
                <a href="{{route('posts.show', $post->id) }}">제목 : {{ $post->title }}</a>
            </span>
          </div>
          <div class="box2">
            {{  $post->content }}
        </div>
          <div class="mt-4 flex items-center">
             <div class="flex mr-2 text-gray-700 text-sm mr-3">
                <svg fill="none" viewBox="0 0 24 24"  class="w-4 h-4 mr-1" stroke="currentColor">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                 </svg>
                <span>12</span>
             </div>
             <div class="flex mr-2 text-gray-700 text-sm mr-8">
                <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                </svg>
                <span>8</span>
             </div>
             <div class="flex mr-2 text-gray-700 text-sm mr-4">
                <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                 </svg>
                <span>share</span>
             </div>

          </div>

       </div>

    </div>

 </div>
 @endforeach
    {{-- <h1>게시판</h1>

       <div class="Creat">
        @auth<!-- 현재로그인한 사용자만 보이게한다.-->
        <a href="/posts/create">
            <button type="submit" class="border-2 border-blue-500 rounded-lg font-bold text-blue-500 px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white mr-6">Creating a Post</button>
        </a>
        @endauth
        <a href="{{route('dashboard')}}">
            <button type="submit" class="border-2 border-blue-500 rounded-lg font-bold text-blue-500 px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white mr-6"> Dashboard</button>
        </a>
    </div>

    <div class="container">
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
            <div>
                {{ $posts->links()}}
            </div>
        </div> --}}
    </body>
</html>
