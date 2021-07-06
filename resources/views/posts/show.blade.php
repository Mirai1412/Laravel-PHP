<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style></style>
    </head>
    <body>
        <div class="container">
            <div>
                <a href="{{route('posts.index', ['page'=>$page])}}">목록보기</a>
            </div>
            <div class="title">
                <label>Title</label>
                <input type="text" name="title" value="{{ $post->title}}" readonly="readonly">
            </div>
            <br>
            <div class="content">
                <label for="content">Content</label>
                <textarea id="content" name="content" readonly="readonly">{{$post->content}}</textarea>
            </div>

            <div class="content">
                <label for ="imageFile">Post Image</label>
                <img class="img-thumbnail" width="25%"
                src="{{$post-> imagePath()}}">
                {{-- src="/storage/images/{{ $post->image ?? 'no.jpg'}}"> --}}

            </div>

            <div class="day">
                <label>Registration Date</label>
                <input
                    type="text"
                    value="{{ $post->updated_at->diffForHumans()/*몇분전에 작성을 했는지*/}}">
            </div>

            <div class="user">
                <label>User ID</label>
                <input type="text" value="{{ $post->user_id}}">
            </div>

            <div>
                <button onclick= location.href="{{ route('post.edit',['post'=>$post->id]) }}">수정</button>
                <button onclick= location.href="{{ route('post.delete', ['id'=>$post->id]) }}">삭제</button>
            </div>

        </div>
    </body>
</html>
