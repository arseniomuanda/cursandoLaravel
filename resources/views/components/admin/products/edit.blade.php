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
                          <input placeholder="Placeholder" value="{{ $product->name }}" id="name" name="name" required
                              data-error="Campo obrigatório" type="text" class="validate">
                          <label for="name">Nome</label>
                      </div>

                      <div class="input-field col s6">
                          <select name="cat" required>
                              <option value="" disabled>Selecionar Categoria</option>
                              @foreach ($categoriesMenu as $category)
                                  <option {{ $category->id == $product->cat ? 'selected' : '' }} value="{{ $category->id }}">{{ Str::ucfirst($category->name) }}</option>
                              @endforeach
                          </select>
                          <label>Materialize Select</label>
                      </div>

                      <div class="input-field col s3">
                          <input id="price" type="number" value="{{ $product->price }}" name="price" min="0" step="0.1" required
                              data-error="Campo obrígatório" class="validate">
                          <label for="price">Preço</label>
                      </div>


                      <div class="input-field col s3">
                          <input id="qtd" type="number" value="{{ $product->qtd }}" name="qtd" min="0" required
                              data-error="Campo obrígatório" class="validate">
                          <label for="qtd">Quantidade</label>
                      </div>

                      <div class="file-field input-field col s6">
                          <div class="btn">
                              <span>Imagem</span>
                              <input type="file" name="image">
                          </div>
                          <div class="file-path-wrapper">
                              <input clasas="file-path validate" type="text" placeholder="Carregar a imagem aqui">
                          </div>
                      </div>

                      <div class="input-field col s12">
                          <textarea id="description" name="description" class="materialize-textarea" data-length="120">{{ $product->name }}</textarea>
                          <label for="description">Descrição</label>
                      </div>

                  </div>
                  <button type="submit" class="waves-effect waves-green btn blue right">Cadastrar</button> <br>
              </form>
          </div>
      </div>
