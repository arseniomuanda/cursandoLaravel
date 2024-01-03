      <!-- Modal Structure -->
      <div id="edit-{{ $product->id }}" class="modal">
          <div class="modal-content">
              <h4><i class="material-icons">edit</i> Editar produto</h4>
              <form class="col s12" action="{{ route('produtos.update', $product->id) }}" method="post"
                  enctype="multipart/form-data">
                  @method('PATCH')
                  @csrf
                  <div class="row">
                      <div class="input-field col s6">
                          <input placeholder="Placeholder" id="name-{{ $product->id }}" name="name" required
                              data-error="Campo obrigatório" value="{{ $product->name }}" type="text"
                              class="validate">
                          <label for="name-{{ $product->id }}">Nome</label>
                      </div>

                      <div class="input-field col s6">
                          <select class="validate {{-- browser-default --}}" name="cat" id="editCar-{{ $product->id }}"
                              required>
                              <option disabled>Selecionar Categoria</option>
                              @foreach ($categoriesMenu as $category)
                                  <option value="{{ $category->id }}"
                                      {{ $product->cat == $category->id ? 'selected' : '' }}>
                                      {{ Str::ucfirst($category->name) }}</option>
                              @endforeach
                          </select>
                          <label for="editCar-{{ $product->id }}">Selecionar Categoria</label>
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

                      <div class="input-field col s3">
                          <input id="price-{{ $product->id }}" type="number" name="price" min="0"
                              step="0.1" required data-error="Campo obrígatório" value="{{ $product->price }}"
                              class="validate">
                          <label for="price-{{ $product->id }}">Preço</label>
                      </div>


                      <div class="input-field col s3">
                          <input id="qtd-{{ $product->id }}" type="number" name="qtd"
                              value="{{ $product->qtd }}" min="0" required data-error="Campo obrígatório"
                              class="validate">
                          <label for="qtd-{{ $product->id }}">Quantidade</label>
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

                      <div class="input-field col s12">
                          <textarea id="description-{{ $product->id }}" name="description" class="materialize-textarea" maxlength="800">{{ $product->description }}</textarea>
                          <label for="description-{{ $product->id }}">Descrição</label>
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
