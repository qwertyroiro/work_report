<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        
    </head>
    <body>
        <h1>教室登録</h1> <!-- 見出しタイトル -->
        <hr>
        
        <p><a href="/report">出退勤報告</a></p>
        <p><a href="/salary">勤務報告</a></p>
        <p><a href="/promotion">進級報告</a></p>
        
        <form action="/register_classroom" method="POST"> <!-- ボタン押下で/register_classroomにPOST実行 -->
            @csrf<!-- csrfトークン -->
            
            <div>
                <h3>教室名</h3>
                <input id="room_name" type="text" name="room_name" value="{{ old("room_name") }}">
            </div>
            
            <br><br>
            <input type="submit" value="登録"/>
        </form>
    </body>
</html>
