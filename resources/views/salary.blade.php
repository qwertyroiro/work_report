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
            var classrooms = @json($classrooms);
            var routes = @json($routes);
        </script>
    </head>
    <body>
        <h1>勤務報告</h1> <!-- 見出しタイトル -->
        <hr>
        
        <p><a href="/report">出退勤報告</a>&nbsp;&nbsp;&nbsp;
        <a>勤務報告</a>&nbsp;&nbsp;&nbsp;
        <a href="/promotion">進級報告</a></p>
        <p><a href="/home">ホーム</a></p>
        
        <form action="/salaried" method="POST"> <!-- ボタン押下で/reportedにPOST実行 -->
            @csrf<!-- csrfトークン -->
            <div class="date">
                <h3>勤務日</h3>
                <select name="salary[month]" id="month">
                    @foreach($month as $key => $value)
                        <option value={{$key}}>{{$value}}</option>
                    @endforeach
                </select>
                月
                <select name="salary[day]" id="day">
                    @foreach($day as $key => $value)
                        <option value={{$key}}>{{$value}}</option>
                    @endforeach
                </select>
                日
            </div>
            
            <div class="teacher">
                <h3>講師名</h3>
                <select id="user" name="salary[teacher]" onchange="change()">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mail">
                <h3>メール</h3>
                <input id="mail" type="text" name="salary[mail]" placeholder="hoge@example.com" value="{{ old("salary.mail") }}">
            </div>
            
            <div class="classroom">
                <h3>教室名</h3>
                <select id="room_name" name="salary[classroom]" onchange="change()">
                    @foreach($classrooms as $classroom)
                        <option value="{{ $classroom->id }}">{{ $classroom->room_name }}</option>
                    @endforeach
                    <!--<option value="A教室">A教室</option>-->
                </select>
            </div>
            
            <div>
                <h3>授業・アシスタント・事務時間</h3>
                <select id="time1" name="salary[time1]" onchange="change()">
                    @for($i = 0; $i <= 360;$i += 30)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                min　
                <select id="time2" name="salary[time2]" onchange="change()">
                    @for($i = 0; $i <= 360;$i += 30)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                min　
                <select id="time3" name="salary[time3]" onchange="change()">
                    @for($i = 0; $i <= 360;$i += 30)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                min
            </div>
            
            <div>
                <h3>給与</h3>
                <input id="salary" type="text" name="salary[salary]" placeholder="600" value="{{ old("salary.salary") }}">
            </div>
            
            <div>
                <h3>出発駅</h3>
                <input id="from" type="text" name="salary[from]" placeholder="○○駅" value="{{ old('salary.from') }}">
            </div>
            
            <div>
                <h3>到着駅</h3>
                <input id="to" type="text" name="salary[to]" placeholder="○○駅" value="{{ old('salary.to') }}">
            </div>
            
            <div>
                <h3>交通費</h3>
                <input id="expenses" type="text" name="salary[expenses]" placeholder="600" value="{{ old('salary.expenses') }}">
                <input type="button" value="登録" onclick="register_classroom()"/>
            </div>
            
            <br><br>
            <input type="submit" value="報告"/>
        </form>
        <form id="hidden_form" action="/register_route" method="POST">
            @csrf<!-- csrfトークン -->
            <input id="user_hidden" name="route[user_id]" type="hidden" value= />
            <input id="room_name_hidden" name="route[classroom_id]" type="hidden" value= />
            <input id="from_hidden" name="route[from]" type="hidden" value= />
            <input id="to_hidden" name="route[to]" type="hidden" value= />
            <input id="expenses_hidden" name="route[price]" type="hidden" value= />
        </form>
        <script src="{{ secure_asset('/js/salary.js') }}"></script>
    </body>
</html>
