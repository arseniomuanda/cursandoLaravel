      <!-- Modal Structure -->
      <div id="edit-{{ $product->id }}" class="modal">
           <div class="modal-content">
            <h4><i class="material-icons">edit</i> Editar produto</h4>
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                        <label for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="last_name" type="text" class="validate">
                        <label for="last_name">Last Name</label>
                    </div>

                    <div class="input-field col s12">
                        <select>
                            <option value="" disabled selected>Selecionar Categoria</option>
                            @foreach ($categoriesMenu as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                        <label>Materialize Select</label>
                    </div>

                </div>

                <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cadastrar</a><br>
        </div>

        </form>
      </div>
