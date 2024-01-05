      <!-- Modal Structure -->
      <div id="edit-{{ $brand->id }}" class="modal">
          <div class="modal-content">
              <h4><i class="material-icons">edit</i> Editar marca</h4>
              <form class="col s12" action="{{ route('brands.update', $brand->id) }}" method="post"
                  enctype="multipart/form-data">
                  @method('PATCH')
                  @csrf
                  <div class="row">
                      <div class="input-field col s6">
                    <input placeholder="Placeholder" value="{{ $brand->name }}" id="name" name="name" required
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
                    <textarea id="description" name="description" class="materialize-textarea" maxlength="800">{{ $brand->description }}</textarea>
                    <label for="description">Descrição</label>
                </div>
                  </div>
                  <button type="submit" class="waves-effect waves-green btn green right">Salvar</button> <br>
              </form>
          </div>
      </div>

      <script>
          document.addEventListener('DOMContentLoaded', function() {
              var selects = document.querySelectorAll('select');
              selects.forEach(function(select) {
                  // Inicialize o select
                  M.FormSelect.init(select);
              });
          });
      </script>
