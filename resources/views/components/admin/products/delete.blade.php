<!-- Modal Structure -->
<div id="delete-{{ $product->id }}" class="modal">
    <div class="modal-content">
        <h4><i class="material-icons">delete</i> Deletar Produto</h4>
        <p>Tem certeza que deseja delectar o produto <b>{{ $product->name }}</b></p>
        <p><b>Quantidade:</b> {{ $product->qtd }} unidades</p>
        <p><b>Marca:</b> {{ Str::ucfirst($product->getBrand->name) }}</p>
        <p><b>Categoria:</b> {{ Str::ucfirst($product->getCategory->name) }}</p>
    </div>
    <div class="modal-footer">
        <form action="{{ route('produtos.destroy', $product->id) }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="waves-effect waves-effect waves-green btn-flat">Confirmar</button>
        </form>
        <a href="#!" class="modal-close waves-green btn ">Cancelar</a>
    </div>
</div>
