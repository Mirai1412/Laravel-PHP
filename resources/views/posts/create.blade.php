<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Post Create</title>
        <style>
            h1 {
                display: inline-block;
                padding-left: 555px;
            }
            form {
                margin: 0 auto;
                width: 400px;
                height: 230px;
                padding: 1em;
                border: 1px solid rgb(0, 0, 0);
                border-radius: 1em;
            }
            textarea {
                vertical-align: top;
                height: 5em;
                resize: vertical;
            }
            label {
                display: inline-block;
                width: 90px;
                text-align: left;
                padding-left: 5px;
            }
            input,
            textarea {
                font: 1em sans-serif;
                width: 300px;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                border: 1px solid rgb(0, 0, 0);
            }
            .button {
                padding-left: 1px;
            }
            button {}
        </style>
    </head>
    <body>
        <h1>Post Create</h1>
        <div class="container">
            <form action="/posts/store" method="post">

                @csrf<!-- 토큰 -->
                <div class="form-group">
                    <label for="title">제목</label>
                    <input type="text" name="title" class="form-group">
                </div>

                <br>

                <div class="form-group">
                    <label for="content">내용</label>
                    <textarea id="content" name="content" class="form-group"></textarea>
                </div>
                <br>

                <div class="button">
                    <button type="submit">확인</button>
                    <button type="submit">취소</button>
                </div>
            </div>
        </form>
    </body>
</html>