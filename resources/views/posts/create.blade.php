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
            action="/posts/store"
            method="post"
            class="w-full mx-auto max-w-3xl bg-white shadow p-8 text-gray-700 ">
            @csrf<!-- 토큰 -->
            <h2 class="w-full my-2 text-3xl font-bold leading-tight my-5">Post Create</h2>
            <!-- name field -->
            <div class="flex flex-wrap mb-6">
                <div class="relative w-full appearance-none label-floating">
                    <input
                        class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                        type="text"
                        name="title"
                        value="{{ old('title')}}"
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
                        placeholder="Message">{{old('content')}}</textarea>
                    <label
                        for="content"
                        class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">Message</label>
                    @error('content')
                    <div>{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="dtn">
                <button
                    type="submit"
                    class="border-2 border-blue-500 rounded-lg font-bold text-blue-500 px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white mr-6">
                    Send</button>
            </div>
        </form>
    </body>
</html>
