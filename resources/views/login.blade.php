@extends("main")
@section("body")
    <h2>Вход</h2>
<form method="post" action="{{ route('user.login') }}">
    @csrf
    @method("post")
    <div>
        <label for="email">Email</label>
        <input type="text" name="email"/>
    </div>
    <div>
        <label for="name">Name</label>
        <input type="text" name="name"/>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password"/>
    </div>
    <input type="submit" content="Регистрация">
</form>
    <p><a href="{{route('user.registration')}}">Регистрация</a></p>
@endsection
