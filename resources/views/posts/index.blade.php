<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>BULLETIN</title>
        <style>
            body {
                width: 800px;
                margin: 0 auto;
                height: 1200px;
            }
            .flex2 {
                margin: 10px;
            }
            h1 {
                text-align: center;
                font-size: 50px;
            }
            div.bg {
                padding: 0;
                margin-bottom: 10px;
                width: 600px;
            }
            div.p-16 {
                padding: 0;
                margin: 10px;
            }
            div.grid {
                margin-bottom: 5px;
            }
            button {
                margin-left: 10px;
                margin-right: 300px;
            }
            div.hidden {
                margin: 10px;
            }
            div.box2{
                width: 600px;
                height: 70px;
            }
        </style>
    </head>
    <body>
        <h1>BULLETIN</h1>
        @foreach ($posts as $post)
        <div class="p-16">

            <div
                class="bg-white overflow-hidden hover:bg-green-100 border border-gray-200 p-3">
                <div class="m-2 text-justify text-sm">
                    <p class="text-right text-xs">
                        {{  $post-> created_at }}</p>
                    <span>
                        <p>Title :
                            {{ $post->title }}</p>
                    </span>
                    <br>
                    <div class="box2">
                        {{  $post->content }}
                    </div>

                    <div class="w-full text-right mt-4">
                        <a href="{{route('post.show', ['id'=>$post->id, 'page'=>$posts->currentPage()])}}">Read More</a>
                    </div>

                </div>
            </div>

        </div>
        @endforeach @auth<!-- 현재로그인한 사용자만 보이게한다.-->
        <a href="/posts/create">
            <button
                type="submit"
                class="border-2 border-blue-500 rounded-lg font-bold text-blue-500 px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white mr-6">Creating a Post</button>
        </a>
        @endauth

        <a href="/posts/mypost">
            <button
                type="submit"
                class="border-2 border-blue-500 rounded-lg font-bold text-blue-500 px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white mr-6">My Post</button>
        </a>

        <a href="{{route('dashboard')}}">
            <button
                type="submit"
                class="border-2 border-blue-500 rounded-lg font-bold text-blue-500 px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white mr-6">
                Dashboard</button>
        </a>


        <div>
            {{ $posts->links()}}
        </div>
</body>
</html>
