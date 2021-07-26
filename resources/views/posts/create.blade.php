<x-app-layout>
    <head>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
            <title>POST CREATE</title>
            <style>

                /* RED BORDER ON INVALID INPUT */

                .file {}
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
                    margin: 10px 0 0;
                    width: 100%;
                }
                h2 {
                    text-align: center;
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

                .rounded-md {
                    width: 192px;
                    height: 44px;
                }
                form{
                    margin: 0;
                }
                .max23{
                    height: 550px;
                    margin-bottom: 50px;
                }

            </style>
        </head>
        <body>
            <x-slot name="header">
                <h2
                    class="font-semibold text-xl text-gray-800 leading-tight"
                    style="text-align: center">
                    {{ __('POST CREATE') }}
                </h2>
            </x-slot>
            <div class="max23">
                <form
                    action="/posts/store"
                    method="post"
                    enctype="multipart/form-data"
                    {{-- 파일을 업로드하기위해 필수 --}}
                    class="w-full mx-auto max-w-3xl bg-white shadow p-8 text-gray-700 ">
                    @csrf<!-- 토큰 -->
                    <div class="flex flex-wrap mb-6">
                        <div class="relative w-full appearance-none label-floating">
                            <input
                                class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                                type="text"
                                name="title"
                                value="{{ old('title')}}"
                                placeholder="Title">
                                <label
                                    for="title"
                                    class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                                    Title
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
                        <!-- file field -->

                        <div class="file">
                            <label for="file" class="">File :
                            </label>
                            <input type="file" id="file" name="imageFile"></div>
                            <br>
                                <div class="dtn">
                                    <button
                                        type="submit"
                                        class="border-2 border-blue-500 rounded-lg font-bold text-blue-500 px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white mr-6">
                                        CREATE</button>

                                </div>
                            </form>
                        </div>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#content'))
                                .then(editor => {
                                    console.log(editor);
                                })
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>
                    </body>
                </x-app-layout>
