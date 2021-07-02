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
                <label>제목</label>
                <input type="text" name="title" value="{{ $post->title}}" readonly="readonly">
            </div>
            <br>
            <div class="content">
                <label>내용</label>
                <textarea id="content" name="content" readonly="readonly">{{$post->content}}</textarea>
            </div>
            <div class="day">
                <label>수정일</label>
                <input
                    type="text"
                    value="{{ $post->updated_at->diffForHumans()/*몇분전에 작성을 했는지*/}}">
            </div>
            <div class="user">
                <label>작성자</label>
                <input type="text" value="{{ $post->user_id}}">
            </div>
        </div>
    </body>
</html>
