<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>User Post</title>
        <style>
            .text-sm {
                padding: 0;
            }
            textarea {
                padding: 0;
                width: 500px;
                height: 80px;
            }
            .flex {
                margin: 0 0 0 211px;
            }
            .font-bold {
                margin-bottom: 3px;
                width: 400px;
                height: 20px;
                padding: 0;
                font-size: 15px;
            }
            .author {
                margin: 0;
            }
            .text-blue-500 {
                float: right;
                margin: 5px 7px 0;
            }
            .w-6 {
                margin: 0 3px;
                font-weight: bolder;
            }

            input {
                padding: 0;
                margin-left: 5px;
                width: 200px;
                height: 30px;
            }
            h2 {
                width: 300px;
                padding: 0;
                font-weight: bolder;
            }
        </style>
    </head>
    <body>
        <div class="mx-auto px-4 py-8 max-w-xl my-20">
            <div class="bg-white shadow-2xl rounded-lg mb-6 tracking-wide">

                <div class="md:flex-shrink-0">
                    <img
                        src="{{$post-> imagePath()}}"
                        alt="mountains"
                        class="w-full h-64 rounded-lg rounded-b-none">
                </div>
                <div class="px-4 py-2 mt-2">
                    <label>
                        Title :</label>
                    <input
                        type="text"
                        name="title"
                        value="{{ $post->title}}"
                        readonly="readonly"
                        class="font-bold text-2xl text-gray-800 tracking-normal"
                        style="border: 0">

                    <div class="text-sm text-gray-700 px-2 mr-1">
                        <textarea id="content" name="content" readonly="readonly" style="border: 0">{{$post->content}}</textarea>
                    </div>

                    <div class="flex items-center justify-between mt-2 mx-6">

                        <a href="{{route('posts.index', ['page'=>$page])}}" class="flex text-gray-700">
                            <svg
                                fill="none"
                                viewbox="0 0 24 24"
                                class="w-6 h-6 text-blue-500"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                            </svg>
                            Go List
                        </a>
                    </div>

                    <div class="box23">
                        <a
                            href="{{ route('post.edit',['post'=>$post->id, 'page'=>$page]) }}"
                            class="text-blue-500 text-xs -ml-3 ">EDIT</a>
                        <form
                            action="{{ route('post.delete',['id'=>$post->id, 'page'=>$page]) }}"
                            method="post">
                            @csrf @method("delete")
                            <button type="submit" class="text-blue-500 text-xs -ml-3 ">
                                DELETE
                            </button>
                        </form>
                    </div>

                    @auth
                    {{-- @if(auth()->user()->id == $post->user_id) --}}
                    @can('update', $user)
                    <div class="author flex items-center -ml-3 my-3">

                        <div class="user-logo">
                            <img
                                class="w-12 h-12 object-cover rounded-full mx-4  shadow"
                                src="{{$post-> imagePath()}}"
                                alt="avatar">
                        </div>

                        <h2 class="text-sm tracking-tighter text-gray-900">
                            USER_ID :<input type="text" value="{{ $post->user_id}}" style="border: 0">
                            Creation Time :<input
                                type="text"
                                value="{{ $post->updated_at->diffForHumans()/*몇분전에 작성을 했는지*/}}"
                                style="border: 0">
                        </h2>
                    </div>
                    {{-- @endif --}}
                    @endcan
                    @endauth
                </div>
            </div>

        </div>

    </div>

</div>
</body>
</html>
