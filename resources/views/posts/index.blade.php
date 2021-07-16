<x-app-layout>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>BULLETIN</title>
        <style>
            body{
                width: 1200px;
                margin: 0 auto;
                height: 1500px;
            }
            div.p-16{
                width: 1150px;
                padding: 0;
                margin: 10px 25px 20px 25px;

            }
            .max-w-7xl{
                margin-bottom: 20px;
            }
            main{

                width: 1200px;
                height: 1050px;
            }
            .max-w-7xl {
                text-align: center;
            }

            .hidden {
                width: 1150px;
                margin: 0 25px 0 25px;

            }
        </style>
    </head>
    <body>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('BULLETIN') }}
        </h2>
    </x-slot>
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
                        {!! $post->content !!}
                    </div>

                    <div class="w-full text-right mt-4">

                        <p>{{ $post->viewers->count() }} {{$post->viewers->count() > 0 ? Str::plural('view',$post->viewers->count())  : 'views'}} </p>

                        <a href="{{route('post.show', ['id'=>$post->id, 'page'=>$posts->currentPage()])}}">Read More</a>
                    </div>

                </div>
            </div>

        </div>
        @endforeach
        <div>
            {{ $posts->links()}}
        </div>
</body>
</x-app-layout>
