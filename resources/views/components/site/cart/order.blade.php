<!-- Modal Structure -->
<div id="order" class="modal">
    <div class="modal-content">
        <table class="responsive-table striped">
            <thead>
                <tr>

                    <th>Nome</th>
                    <th></th>
                    <th>U. Preço</th>
                    <th>Quantidade</th>
                    <th>Subtotal</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($cart as $item)
                    <tr>
                        <td><img src="{{ url("storage/{$item->getProduct->image}") }}" alt="{{ $item->getProduct->name }}"
                                width="40" height="40" class="circle">
                        </td>
                        <td>{{ $item->getProduct->name }}</td>
                        <td>AOA {{ number_format($item->getProduct->price, 2, ',', '.') }}</td>
                        <td>{{ $item->qtd }}
                        </td>
                        <td> AOA {{ number_format($item->subTotal(), 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <span class="card-title">
                <h5>Valor total: AOA {{ number_format($total, 2, ',', '.') }}</h5>
            </span>
            <p>Promoções A-loja</p>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-green btn right">Cancelar</a>
        <form method="post" onsubmit="event.preventDefault();">
            @method('DELETE')
            @csrf
            <button type="submit" class="waves-effect waves-effect waves-green btn-flat">Confirmar</button>
        </form>
    </div>
</div>
