@extends('login.auth_layout')
@section('title', 'Nova Conta - A-Loja')
@section('content')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    @endif

    <main>
        <center class="center">
            <img class="responsive-img" style="width: 250px;" src="https://i.imgur.com/ax0NCsK.gif" />
            <div class="section"></div>

            <h5 class="indigo-text">Rigistrar nova conta!</h5>
            <div class="section"></div>

            <div class="container">
                <div class="z-depth-1 grey lighten-4 row"
                    style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

                    <form class="col s12" action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class='row'>
                            <div class='col s12'>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='text' name='name' id='name' />
                                <label for='name' data-error="Campo obrigatório">Nome</label>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='text' name='whatsapp' maxlength="9" pattern="^\9\s\d{8}$"
                                    title="Por favor, insira um número de telefone válido angolano" id='whatsapp' />
                                <label for='whatsapp' data-error="Telefone inválido!">Telefone</label>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='email' name='email' id='email' />
                                <label for='email' data-error="Email invádido!">Email</label>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='password' name='password' id='password' />
                                <label for='password' data-error="Campo obrigatório">Password</label>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='password' name='password_confirmation' id='password' />
                                <label for='password' data-error="Campo obrigatório">Confirmar password</label>
                            </div>
                            <label style='float: right;'>
                                <a class='green-text' href='{{ route('login') }}'><b>Já possui uma conta?</b></a>
                            </label>
                        </div>

                        <br />
                        <center>
                            <div class='row'>
                                <button type='submit' name='btn_login'
                                    class='col s12 btn btn-large waves-effect indigo'>Save</button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script>
    $(document).ready(function() {
        $('#whatsapp').mask('+244 999999999');
    });
</script>
