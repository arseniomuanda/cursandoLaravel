<!-- Modal Structure -->
<div id="addProduct" class="modal">
    <div class="modal-content">
        <h4><i class="material-icons">card_giftcard</i> Novo produto</h4>
        <form class="col s12" action="{{ route('produtos.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Placeholder" id="name" name="name" required
                        data-error="Campo obrigatório" type="text" class="validate">
                    <label for="name">Nome</label>
                </div>

                 <div class="input-field col s3">
                    <input id="price" type="text" name="price" min="0" required
                        data-error="Campo obrígatório" class="validate">
                    <label for="price">Preço</label>
                </div>

                <div class="input-field col s3">
                    <input id="qtd" type="number" name="qtd" min="0" required
                        data-error="Campo obrígatório" class="validate">
                    <label for="qtd">Quantidade</label>
                </div>

                <div class="input-field col s6">
                    <select name="brand" required>
                        <option value="" disabled selected>Selecionar Marca</option>
                        @foreach ($brandsMenu as $brand)
                            <option value="{{ $brand->id }}">{{ Str::ucfirst($brand->name) }}</option>
                        @endforeach
                    </select>
                    <label>Selecionar Marca</label>
                </div>

                <div class="input-field col s6">
                    <select name="cat" required>
                        <option value="" disabled selected>Selecionar Categoria</option>
                        @foreach ($categoriesMenu as $category)
                            <option value="{{ $category->id }}">{{ Str::ucfirst($category->name) }}</option>
                        @endforeach
                    </select>
                    <label>Selecionar Categoria</label>
                </div>

                <div class="file-field input-field col s6">
                    <div class="btn">
                        <span>Imagem</span>
                        <input type="file" name="image">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>

                <div class="input-field col s6">
                    <textarea id="description" name="description" class="materialize-textarea" maxlength="800"></textarea>
                    <label for="description">Descrição</label>
                </div>

            </div>
            <button type="submit" class="waves-effect waves-green btn green right">Cadastrar</button> <br>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var textarea = document.querySelector('textarea#description');
        var counter = document.createElement('p');
        var maxLength = textarea.getAttribute('maxlength');

        counter.textContent = '(' + maxLength + ')';
        textarea.parentNode.appendChild(counter);

        textarea.addEventListener('input', function() {
            var remainingChars = maxLength - textarea.value.length;
            counter.textContent = '(' + remainingChars + ')';
        });
    });
</script>
