@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <p><a href="/report">出退勤報告</a></p>
                    <p><a href="/salary">勤務報告</a></p>
                    <p><a href="/promotion">進級報告</a></p>
                    <p><a id="register_classroom">教室登録</a></p>
                    
                    <form onSubmit="return deleteUser()" action="/users/{{ $user }}" id="delete_user" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">ユーザー削除</button> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var user_admin = @json($user_admin->role);
    function deleteUser(){
      return confirm("削除しますか");
    }
    
    window.onload = function() {
        if(user_admin == "admin"){
            document.getElementById("register_classroom").setAttribute("href", "/input_classroom");
        }
    }
</script>
@endsection
