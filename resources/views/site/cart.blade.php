@extends('site.layout')
@section('title', 'Carrinho')
@section('content')
    <div class="row container">
        <h4>Seu carrinho possui: {{ $items->count() }}</h4>
        <table class="responsive-table striped">
            <thead>
                <tr>

                    <th>Image</th>
                    <th>Nome</th>
                    <th>U. Preço</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                    <th>Opção</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>
                            <a href="{{ route('site.details', $item->id) }}"><img src="{{ $item->attributes->image }}"
                                    alt="{{ $item->name }}" width="40" height="40" class="circle"></a>
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ number_format($item->price, 2, ',' . '.') }}</td>
                        <td style="width: 40px"><input type="number" name="quantity" value="{{ $item->quantity }}"></td>
                        <td>{{ $item->getSubTotal }}</td>
                        <td>
                            <button class="btn-floating waves-effect waves-light orange"><i
                                    class="material-icons">refresh</i></button>
                            <button class="btn-floating waves-effect waves-light orange"><i
                                    class="material-icons">delete</i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="5">Total</th>
                    <td colspan="">{{ 2334 }}</td>
                </tr>
            </tfoot>
        </table>

        <div class="row container center">
            <div class="col m4"> <button class="btn waves-effect waves-light blue">Continuar<i
                        class="material-icons right">arrow_back</i></button>
            </div>
            <div class="col m4"> <button class="btn waves-effect waves-light red">Limpar<i
                        class="material-icons right">clear</i></button>
            </div>
            <div class="col m4"> <button class="btn waves-effect waves-light green">Finalizar Pedido<i
                        class="material-icons right">check</i></button>
            </div>
        </div>
    </div>
@endsection
