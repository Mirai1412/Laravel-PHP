<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style>
            body{
                margin: 0 auto;
                width: 822px;
                height: 1000px;
            }

            h1 {

                text-align: center;
            }

            li,
            ul {
                list-style: none;
                max-width: 250px;
                font-size: 15px;
                text-align: left;
            }
            ul{
                padding: 0;
            }
                div.box{
                    width: 800px;
                    height: 100px;
                    border: 1px solid rgb(0, 0, 0);
                    margin: 0 auto;
                    padding: 10px;
                    margin-bottom:10px ;
                    text-align: left;
                }

                span{
                    margin-top: 5px;
                }

                div.flex{
                    width: 150px;
                    margin: 0px;
                    text-align: left;
                }

                p{
                    width: 300px;
                    margin: 0px;
                    text-align: left;
                }

                .btn{
                  width: 130px;
                 height: 25px;

                }

            button{
              width: 100px;
              height: 100px;
                }

                svg{
                    width: 100px;
                    height: 100px;
                    margin-right: 80px;
                    margin-left: 80px;
                    padding: 5px;
                }/*세미콜론 확인 */

                div{
                    text-align: center;

                }
                .box2{
                    text-align: left;
                    width: 722px;
                    margin: 0;
                }

                .dashboard{

                }
            }
        </style>
 </head>
<body>
    <h1>게시판</h1>
    <div class="box2">
        @auth<!-- 현재로그인한 사용자만 보이게한다.-->

        <a href="/posts/create">
            <button type="submit" class="btn">게시글 작성하기</button>
        </a>

        @endauth

        <a href="{{route('dashboard')}}" class="dashboard">Dashboard</a>

    </div>

    <div class="container">
        <ul>
            @foreach ($posts as $post)
            <li>
                <div class="box">

                    <span>
                        <a href="{{route('posts.show', ['id'=>$post->id, 'page'=>$posts->currentPage()])}}">제목 : {{ $post->title }}</a>
                    </span>

                    <div class="box2">
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
        </div>
    </body>
</html>
