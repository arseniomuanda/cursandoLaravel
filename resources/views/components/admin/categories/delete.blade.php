<!-- Modal Structure -->
<div id="delete-{{ $category->id }}" class="modal">
    <div class="modal-content">
        <h4><i class="material-icons">delete</i> Deletar categoria</h4>
        <p>Tem certeza que deseja delectar a categoria {{ $category->name }}</p>
        <p>Esta acção vai delectar  {{ $category->products->count() }} produtos relacionados</p>
    </div>
    <div class="modal-footer">
        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="waves-effect waves-effect waves-green btn-flat">Confirmar</button>
        </form>
        <a href="#!" class="modal-close waves-green btn ">Cancelar</a>
    </div>
</div>
