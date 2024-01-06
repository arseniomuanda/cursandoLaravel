<!-- Modal Structure -->
<div id="delete-{{ $item->id }}" class="modal">
    <div class="modal-content">
        <h4><i class="material-icons">delete</i> Deletar Item</h4>
        <p>Tem certeza que deseja delectar o item {{ $item->name }}</p>
        <p>Esta acção vai delectar  {{ $item->qtd }} items no carrinho</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-green btn right">Cancelar</a>
        <form action="{{ route('site.remCart', $item->id) }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="waves-effect waves-effect waves-green btn-flat">Confirmar</button>
        </form>
    </div>
</div>
