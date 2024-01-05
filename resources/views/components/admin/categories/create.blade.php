<!-- Modal Structure -->
<div id="addProduct" class="modal">
    <div class="modal-content">
        <h4><i class="material-icons">domain</i> Nova categoria</h4>
        <form class="col s12" action="{{ route('brands.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Placeholder" id="name" name="name" required
                        data-error="Campo obrigatório" type="text" class="validate">
                    <label for="name">Nome</label>
                </div>

                <div class="file-field input-field col s6">
                    <div class="btn">
                        <span>Logo</span>
                        <input type="file" name="logo">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>

                <div class="input-field col s12">
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
