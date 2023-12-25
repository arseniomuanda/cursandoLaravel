@extends('login.auth_layout')
@section('title', 'Login - A-Loja')
@section('content')
    @if ($message = Session::get('error'))
        <div class="card red">
            <div class="card-content white-text">
                <span class="card-title">Error!</span>
                <p>{{ $message }}</p>
            </div>
        </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    @endif

    <main>
        <center class="center">
            <img class="responsive-img" style="width: 250px;" src="https://i.imgur.com/ax0NCsK.gif" />
            <div class="section"></div>

            <h5 class="indigo-text">Please, login into your account</h5>
            <div class="section"></div>

            <div class="container">
                <div class="z-depth-1 grey lighten-4 row"
                    style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

                    <form class="col s12" action="{{ route('login.auth') }}" method="POST">
                        @csrf
                        <div class='row'>
                            <div class='col s12'>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='email' name='email' id='email' />
                                <label for='email' data-error="Email invádido">Enter your email</label>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='password' name='password' id='password' />
                                <label for='password' data-error="Campo obrigatório">Enter your password</label>
                            </div>
                             <label style='float: left;'>
                                <a class='green-text' href='{{ route('register') }}'><b>Registar-se!</b></a>
                            </label>
                            <label style='float: right;'>
                                <a class='pink-text' href='#!'><b>Forgot Password?</b></a>
                            </label>
                        </div>

                        <br />
                        <center>
                            <div class='row'>
                                <button type='submit' name='btn_login'
                                    class='col s12 btn btn-large waves-effect indigo'>Login</button>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
            <a href="#!">Create account</a>
        </center>

        <div class="section"></div>
        <div class="section"></div>
    </main>
@endsection
