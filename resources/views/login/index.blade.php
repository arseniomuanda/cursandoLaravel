@if ($message = Session::get('error'))
    <div class="card green">
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

<form action="{{ route('login.auth') }}" method="POST">
    @csrf
    <div class="input-field col s12 l6">
        <input type="email" id="email" required name="email" class="validate">
        <label for="email">Email</label>
    </div>
    <div class="input-field col s12 l6">
        <input type="password" required id="password" name="password" class="validate">
        <label for="password">Password</label>
    </div>

    <button>Entrar</button>
</form>
