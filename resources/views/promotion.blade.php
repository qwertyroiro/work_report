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
        <h1>進級報告</h1> <!-- 見出しタイトル -->
        <hr>
        
        <p><a href="/report">出退勤報告</a>&nbsp;&nbsp;&nbsp;
        <a href="/salary">勤務報告</a>&nbsp;&nbsp;&nbsp;
        <a>進級報告</a></p>
        <p><a href="/home">ホーム</a></p>
        
        <form action="/promoted" method="POST"> <!-- ボタン押下で/reportedにPOST実行 -->
        @csrf<!-- csrfトークン -->
        
            <div class="classroom">
                <h3>教室名</h3>
                <select name="promotion[classroom]">
                    @foreach($classrooms as $classroom)
                        <option value="{{ $classroom->room_name }}">{{ $classroom->room_name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="student">
                <h3>生徒名</h3>
                <textarea id=1 name="promotion[student]"></textarea>
            </div>
            
            <div class="date">
                <h3>クリア日</h3>
                <select id="month" name="promotion[month]">
                    @foreach($month as $key => $value)
                        <option value={{$key}}>{{$value}}</option>
                    @endforeach
                </select>
                月
                <select id="day" name="promotion[day]">
                    @foreach($day as $key => $value)
                        <option value={{$key}}>{{$value}}</option>
                    @endforeach
                </select>
                日
            </div>
            
            <div class"rank">
                <h3>クリア級</h3>
                <select name="promotion[rank]">
                    <option value="learner">見習い級</option>
                    @for($i = 6; $i >= 1 ;$i--)
                        <option value="{{ $i }}rank">{{ $i }}級</option>
                    @endfor
                    <option value="learner">初段</option>
                    @for($i = 2; $i <= 3 ;$i++)
                        <option value="{{ $i }}dan">{{ $i }}段</option>
                    @endfor
                </select>
            </div>
            
            <div class="teachers">
                <h3>講師名</h3>
                <select id="user" name="promotion[teacher]">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <br><br>
            <input type="submit" value="報告"/>
        </form>
        <script src="{{ secure_asset('/js/promotion.js') }}"></script>
    </body>
</html>