<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Post Create</title>
        <style>
            body {
                margin: 0 auto;
            }
            /* RED BORDER ON INVALID INPUT */
            .check input:invalid {
                border-color: red;
            }
            .file {
                }
            form {
                margin: 100px;
            }
            /* FLOATING LABEL */
            .label-floating input:not(:placeholder-shown),
            .label-floating textarea:not(:placeholder-shown) {
                padding-top: 1.4rem;
            }
            .label-floating input:not(:placeholder-shown) ~ label,
            .label-floating textarea:not(:placeholder-shown) ~ label {
                font-size: 0.8rem;
                transition: all 0.2s ease-in-out;
                color: #1f9d55;
                opacity: 1;
            }
            button {
                width: 100%;
            }
        </style>
    </head>
    <body>
        <form
            action="{{ route('post.update',['id'=>$post->id])}}"
            method="post"
            enctype="multipart/form-data"
            {{-- 파일을 업로드하기위해 필수 --}}
            class="w-full mx-auto max-w-3xl bg-white shadow p-8 text-gray-700 ">
            @csrf<!-- 토큰 -->
            {{-- method spoofing --}}
            {{-- <input type="hidden" name="_method" value="put"> --}}
            @method("put")
            <h2 class="w-full my-2 text-3xl font-bold leading-tight my-5">Post Create - UPDATE</h2>
            <!-- name field -->
            <div class="flex flex-wrap mb-6">
                <div class="relative w-full appearance-none label-floating">
                    <input
                        class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                        type="text"
                        name="title"
                        value="{{ old('title') ? old('title') : $post->title}}"
                        placeholder="Your name"
                        required="required">
                    <label
                        for="title"
                        class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                        Your name
                    </label>
                    @error('title')
                    <div>{{$message}}</div>
                    @enderror
                    <!-- 에러 메세지 출력 -->
                </div>
            </div>

            <!-- Message field -->

            <div class="flex flex-wrap mb-6">
                <div class="relative w-full appearance-none label-floating">
                    <textarea
                        class="autoexpand tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                        id="content"
                        name="content"
                        placeholder="Message">{{old('content') ? old('content'): $post->content}}</textarea>
                    <label
                        for="content"
                        class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">Message</label>
                    @error('content')
                    <div>{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- file field -->
            <div class="">
                <img
                    class="img-thumbnail"
                    width="25%"
                    src="{{$post->imagePath()}}">
            </div>
            <br>
            <div class="file">
                <label for="file" class="">File :
                </label>
                <input type="file" id="file" name="imageFile">
                @error('imageFile')
                <div>{{ $message }}</div>
            @enderror
            </div>
            <br>
            <div class="dtn">
                <button
                    type="submit"
                    class="border-2 border-blue-500 rounded-lg font-bold text-blue-500 px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white mr-6">
                    UPDATE</button>
            </div>
        </form>
    </body>
</html>
