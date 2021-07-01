<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style>
            h1 {
                margin-left: 310px;
                margin-bottom: 0px;
            }
            
            li,
            ul {
                list-style: none;
                margin: 0;
                padding: 0;
                max-width: 250px;
                padding: 5px 0px 5px 5px;
                font-size: 15px
            }

                div.box{
                    width: 600px;
                    height: 100px;
                    border: 1px solid rgb(0, 0, 0);
                    margin-left: 300px;
                    padding: 10px;
                }
                span{
                    margin-top: 5px
                }
                div{
                    margin-bottom: 2px
                    margin-top: 2px
                }
            button{
              margin-left: 310px;
                }
            }
        </style>
 </head>
<body>
<h1>게시판</h1>
<div class="container">
    <ul>
        @foreach ($posts as $post)
        <li>
            <div class="box">
                <span>제목 :
                    {{  $post->title }}</span>

                <div >
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
        <div>
            <a href="/posts/create" >
                <button type="submit">게시글 작성하기</button>
            </a>
            </div>
    </div>
</body>
</html>