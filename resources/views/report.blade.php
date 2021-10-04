<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <script>
            var users = @json($users);
            var current_user = @json($auths->id);
        </script>
    </head>
    <body>
        <h1>出退勤報告</h1> <!-- 見出しタイトル -->
        <hr>
        
        <p><a>出退勤報告</a>&nbsp;&nbsp;&nbsp;
        <a href="/salary">勤務報告</a>&nbsp;&nbsp;&nbsp;
        <a href="/promotion">進級報告</a></p>
        <p><a href="/home">ホーム</a></p>
        
        <form action="/reported" method="POST"> <!-- ボタン押下で/reportedにPOST実行 -->
            @csrf<!-- csrfトークン -->
            <div class="date">
                <h3>勤務日</h3>
                <select name="report[month]" id="month">
                    @foreach($month as $key => $value)
                        <option value={{$key}}>{{$value}}</option>
                    @endforeach
                </select>
                月
                <select name="report[day]" id="day">
                    @foreach($day as $key => $value)
                        <option value={{$key}}>{{$value}}</option>
                    @endforeach
                </select>
                日
            </div>
            
            <div class="teachers">
                <h3>講師名</h3>
                <select id="user" name="report[teacher]">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="DACreport">
                <h3>出発・到着・終了報告</h3>
                <select id=DAC name="report[DAC]" onchange="change()">
                    <option value="出発">出発</option>
                    <option value="到着">到着</option>
                    <option value="終了">終了</option>
                </select>
            </div>

            <div class="classroom">
                <h3>教室名</h3>
                <select name="report[classroom]">
                    @foreach($classrooms as $classroom)
                        <option value="{{ $classroom->room_name }}">{{ $classroom->room_name }}</option>
                    @endforeach
                    <!--<option value="A教室">A教室</option>-->
                </select>
            </div>
            
            <div>
                <h3 id=0>欠席生徒</h3>
                <textarea id=1 name="report[absence]"></textarea>
            </div>
            
            <div>
                <h3 id=2>遅刻生徒</h3>
                <textarea id=3 name="report[delay]"></textarea>
            </div>
            
            <div>
                <h3 id=4>報告事項</h3>
                <textarea id=5 name="report[report]"></textarea>
            </div>
            
            <br><br>
            <input type="submit" value="報告"/>
        </form>
        <script src="{{ secure_asset('/js/report.js') }}"></script>
    </body>
</html>
