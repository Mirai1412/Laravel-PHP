<!DOCTYPE html>
<html lang="en">
<head>
    <title>Post Create</title>
    <style>
    form {
    margin: 0 auto;
    width: 400px;
    height: 200px;
    padding: 1em;
    border: 1px solid #CCC;
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
}
input, textarea {
    font: 1em sans-serif;
    width: 300px;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    border: 1px solid #999;
}
.button {
    padding-left: 90px;
}
button {
    margin-left: .5em;
}
    </style>
</head>
<body>
    <form method="post">
        <div>
          <label for="name" >제목</label>
          <input type="nmae">
        </div>
        <br>
        <div>
            <label for="text">내용</label>
            <textarea id="text"></textarea>
        </div>
        <br>
        <div class="button">
        <button type="submit">확인</button>
        <button type="submit">취소</button>
    </div>
      </form>
</body>
</html>