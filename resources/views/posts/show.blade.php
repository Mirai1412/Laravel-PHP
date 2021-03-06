<x-app-layout>
    <html lang="en">
        <head>
            <meta charset="UTF-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
                <title>User Post</title>
                <style>
                    body {
                        height: 1500px;
                    }
                    .font-bold {
                        margin: 10px;
                    }
                    p {
                        margin-left: 15px;
                        margin-bottom: 15px;
                    }
                    .min-h-screen {
                        width: 1200px;
                        margin: 0 auto;
                    }
                    .max-w-7xl {
                        width: 1200px;
                        margin: 0 auto;
                    }
                    .hidden {
                        width: 1000px;
                    }
                    .max2 {
                        height: 660px;
                        width: 1200px;
                    }
                    .feeling_div {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }
                    .button-container {
                        margin-left: 20px;
                    }
                    .feeling_a {
                        background-color: #fff;
                        border: 2px solid #2199e8;
                        padding: 10px 20px;
                        border-radius: 2px;
                        color: #2199e8;
                    }
                    .active {
                        background-color: #2199e8;
                        color: #fff;
                        }
                </style>
                <script>

                    $('.like-container > .feeling_a, .dislike-container  > .feeling_a').on('click', function () {
                        event.preventDefault();
                        $('.active').removeClass('active');
                        $(this).addClass('active');
                    });
                </script>
            </head>
            <body>
                <x-slot name="header">
                    <h2
                        class="font-semibold text-xl text-gray-800 leading-tight"
                        style="text-align: center">
                        {{ __('POST') }}
                    </h2>
                </x-slot>
                <div class="max2">
                    <div
                        class='flex max-w-xl my-10 bg-white shadow-md rounded-lg overflow-hidden mx-auto'>
                        <div class='flex items-center w-full'>
                            <div class='w-full'>
                                <div style="width: 200px" class="flex flex-row mt-2 px-2 py-3 mx-3">
                                    <div class="w-auto h-auto rounded-full border-2 border-pink-500"></div>

                                    <div class="flex flex-col mb-2 ml-4 mt-1">

                                        <div class='text-gray-600 text-sm font-semibold'>
                                            <input
                                                type="text"
                                                value="{{ $post->user->name}}"
                                                style="border: 0; padding: 0; height: 20px;"></div>

                                            <div class='flex w-full mt-1'>

                                                <input
                                                    type="text"
                                                    value="{{ $post->updated_at->diffForHumans()/*???????????? ????????? ?????????*/}}"
                                                    style="border: 0; padding: 0; height: 15px; font-weight: 100;"></div>
                                            </div>
                                            @auth
                                            {{-- @if(auth()->user()->id == $post->user_id) --}}
                                            @can('update', $post)
                                            <div class="box23" style="width: 300px;">
                                                <form
                                                    action="{{ route('post.delete',['id'=>$post->id, 'page'=>$page]) }}"
                                                    method="post">
                                                    @csrf @method("delete")
                                                    <button
                                                        type="submit"
                                                        class="text-blue-500 text-xs -ml-3 "
                                                        style="margin-left:260px ">
                                                        DELETE
                                                    </button>
                                                </form>
                                                <a
                                                    href="{{ route('post.edit',['id'=>$post->id, 'page'=>$page]) }}"
                                                    class="text-blue-500 text-xs -ml-3 "
                                                    style="margin-left:260px ">EDIT</a>
                                            </div>
                                            @endcan @endauth
                                        </div>
                                        <div class="border-b border-gray-100"></div>
                                        <img
                                            src="{{$post-> imagePath()}}"
                                            alt="mountains"
                                            class="w-full h-64 rounded-lg rounded-b-none">
                                            <input
                                                type="text"
                                                name="title"
                                                value="{{ $post->title}}"
                                                readonly="readonly"
                                                class="font-bold text-2xl text-gray-800 tracking-normal"
                                                style="border: 0">
                                                <div class="text-sm text-gray-700 px-2 mr-1">
                                                    <div
                                                        id="content"
                                                        name="content"
                                                        readonly="readonly"
                                                        style="border: 0; margin: 0 0 15px 15px;">{!! $post->content !!}</div>
                                                </div>
                                                <div class="flex justify-start mb-4 border-t border-gray-100">
                                                    <div class="flex w-full mt-1 pt-2 pl-5">
                                                        <span
                                                            class="bg-white transition ease-out duration-300 hover:text-red-500 border w-8 h-8 px-2 pt-2 text-center rounded-full text-gray-400 cursor-pointer mr-2">
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                fill="none"
                                                                width="14px"
                                                                viewbox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                                                            </svg>
                                                        </span>
                                                        <img
                                                            class="inline-block object-cover w-8 h-8 text-white border-2 border-white rounded-full shadow-sm cursor-pointer"
                                                            src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                            alt=""/>
                                                        <img
                                                            class="inline-block object-cover w-8 h-8 -ml-2 text-white border-2 border-white rounded-full shadow-sm cursor-pointer"
                                                            src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                            alt=""/>
                                                        <img
                                                            class="inline-block object-cover w-8 h-8 -ml-2 text-white border-2 border-white rounded-full shadow-sm cursor-pointer"
                                                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80"
                                                            alt=""/>
                                                        <img
                                                            class="inline-block object-cover w-8 h-8 -ml-2 text-white border-2 border-white rounded-full shadow-sm cursor-pointer"
                                                            src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80"
                                                            alt=""/>
                                                    </div>
                                                    <div class="flex justify-end w-full mt-1 pt-2 pr-5">
                                                        <span
                                                            class="transition ease-out duration-300 hover:bg-blue-50 bg-blue-100 h-8 px-2 py-2 text-center rounded-full text-blue-400 cursor-pointer mr-2">
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                fill="none"
                                                                width="14px"
                                                                viewbox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                                            </svg>

                                                        </span>
                                                        <span
                                                            class="transition ease-out duration-300 hover:bg-blue-500 bg-blue-600 h-8 px-2 py-2 text-center rounded-full text-gray-100 cursor-pointer">
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                fill="none"
                                                                width="14px"
                                                                viewbox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                                            </svg>

                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex w-full border-t border-gray-100">
                                                    <div class="mt-3 mx-5 flex flex-row">
                                                        <div
                                                            class='flex text-gray-700 font-normal text-sm rounded-md mb-2 mr-4 items-center'>Comments:<div class="ml-1 text-gray-400 font-thin text-ms">
                                                                30</div>
                                                        </div>
                                                        <div
                                                            class='flex text-gray-700 font-normal text-sm rounded-md mb-2 mr-4 items-center'
                                                            style="width: 100px">

                                                            {{ $post->viewers->count() }}
                                                            {{$post->viewers->count() > 0 ? Str::plural('view',$post->viewers->count())  : 'views'}}

                                                        </div>
                                                    </div>
                                                    <div
                                                        class="mt-3 mx-5 w-full flex justify-end"
                                                        style="margin-left: 100px; width: 820px;">
                                                        <div
                                                            class='flex text-gray-700 font-normal text-sm rounded-md mb-2 mr-4 items-center'>Likes:
                                                            <div class="ml-1 text-gray-400 font-thin text-ms">
                                                                120k</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="feeling_div">
                                                    <div class="button-container like-container">
                                                        <button class="feeling_a">
                                                            <i class="fa fa-heart-o">
                                                                Like</i>
                                                        </a>
                                                    </div>
                                                    <div class="button-container dislike-container">
                                                        <button class="feeling_a">
                                                            <i class="fa fa-heart">
                                                                Dislike</i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div
                                                    class="relative flex items-center self-center w-full max-w-xl p-4 overflow-hidden text-gray-600 focus-within:text-gray-400">
                                                    <img
                                                        class='w-10 h-10 object-cover rounded-full shadow mr-2 cursor-pointer'
                                                        alt='User avatar'
                                                        src="https://picsum.photos/536/354">
                                                        <span class="absolute inset-y-0 right-0 flex items-center pr-6">
                                                            <button
                                                                type="submit"
                                                                class="p-1 focus:outline-none focus:shadow-none hover:text-blue-500">
                                                                <svg
                                                                    class="w-6 h-6 transition ease-out duration-300 hover:text-blue-500 text-gray-400"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none"
                                                                    viewbox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>

                                                                </svg>
                                                            </button>
                                                        </span>
                                                        <input
                                                            type="search"
                                                            class="w-full py-2 pl-4 pr-10 text-sm bg-gray-100 border border-transparent appearance-none rounded-tg placeholder-gray-400 focus:bg-white focus:outline-none focus:border-blue-500 focus:text-gray-900 focus:shadow-outline-blue"
                                                            style="border-radius: 25px"
                                                            placeholder="Post a comment..."
                                                            autocomplete="off"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </body>

                                    </x-app-layout>
