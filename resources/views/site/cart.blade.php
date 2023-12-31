@extends('site.layout')
@section('title', 'Carrinho')
@section('content')
    <div class="row container">

        @if ($message = Session::get('success'))
            <div class="card green">
                <div class="card-content white-text">
                    <span class="card-title">Parabéns</span>
                    <p>{{ $message }}</p>
                </div>
            </div>
        @endif

        @if ($message = Session::get('info'))
            <div class="card blue">
                <div class="card-content white-text">
                    <span class="card-title">{{ Session::get('subjet') }}</span>
                    <p>{{ $message }}</p>
                </div>
            </div>
        @endif

        @if ($items->count() == 0)
            <div class="card orange">
                <div class="card-content white-text">
                    <span class="card-title">Carrinho Vazio!</span>
                    <div class=""> <a href="{{ route('site.index') }}"
                            class="btn waves-effect waves-light red">Voltar<i
                                class="material-icons right">arrow_back</i></a>
                    </div>
                </div>
            </div>
        @else
            <h4>Seu carrinho possui: {{ $items->count() }}</h4>
            <table class="responsive-table striped">
                <thead>
                    <tr>

                        <th>Nome</th>
                        <th></th>
                        <th>U. Preço</th>
                        <th>Quantidade</th>
                        <th>Total</th>
                        <th colspan="">Opção</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>
                                <a href="{{ route('site.details', $item->id) }}">
                                    <img src="{{ url("storage/{$item->attributes->image}") }}" alt="{{ $item->name }}" width="40"
                                        height="40" class="circle">
                                </a>
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>AOA {{ number_format($item->price, 2, ',', '.') }}</td>
                            <td>
                                {{-- //TODO: Adicionar e diminior quantity do item --}}
                                {{-- Actualizar --}}
                                <form id="updateItemCart" enctype="multipart/form-data"
                                    action="{{ route('site.updadeCart', $item->id) }}" method="post">
                                    @csrf
                                    <input style="font-weight:900; width: 80px" class="center white" type="number"
                                        min="1" name="quantity" value="{{ $item->quantity }}">
                                        <button class="btn-floating waves-effect waves-light green">
                                        <i class="material-icons">refresh</i></button>
                                </form>
                            </td>
                            <td>
                                {{-- //TODO: mostrar o total de cada item --}}
                            </td>
                            <td>
                                {{-- Remover --}}
                                <form enctype="multipart/form-data" action="{{ route('site.remCart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button class="btn-floating waves-effect waves-light red">
                                        <i class="material-icons">delete</i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card orange">
                <div class="card-content white-text">
                    <span class="card-title"><h5>Valor total: AOA {{ number_format(\Cart::getTotal(), 2, ',', '.') }}</h5></span>
                    <p>Promoções A-loja</p>
                </div>
            </div>


            <div class="row container center">
                <div class="col m4"> <a href="{{ route('site.index') }}"
                        class="btn waves-effect waves-light blue">Continuar<i
                            class="material-icons right">arrow_back</i></a>
                </div>
                <div class="col m4"> <a href="{{ route('site.clearCart') }}"
                        class="btn waves-effect waves-light red">Limpar<i class="material-icons right">clear</i></a>
                </div>
                <div class="col m4"> <button class="btn waves-effect waves-light green">Finalizar Pedido<i
                            class="material-icons right">check</i></button>
                </div>
            </div>
        @endif


    </div>
@endsection
