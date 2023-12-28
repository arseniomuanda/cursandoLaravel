@extends('admin.layout')
@section('title', 'A-Loja - Produtos')
@section('content')
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large bg-gradient-green modal-trigger" href="#modal1">
            <i class="large material-icons">add</i>
        </a>
    </div>

    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4><i class="material-icons">card_giftcard</i> Novo produto</h4>
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
                            <option value="" disabled selected>Choose your option</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                        <label>Materialize Select</label>
                    </div>

                </div>

                <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cadastrar</a><br>
        </div>

        </form>
    </div>
    <div class="row container crud">
        <div class="row titulo ">
            <h1 class="left">Produtos</h1>
            <span class="right chip">234 produtos cadastrados</span>
        </div>

        <nav class="bg-gradient-blue">
            <div class="nav-wrapper">
                <form>
                    <div class="input-field">
                        <input placeholder="Pesquisar..." id="search" type="search" required>
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
            </div>
        </nav>

        <div class="card z-depth-4 registros">
            <table class="striped ">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td><img src="{{ $item->image }}" class="circle "></td>
                            <td>#{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>AOA {{ number_format($item->price, '2', ',', '.') }}</td>
                            <td>{{ Str::ucfirst($item->getCategory->name) }}</td>
                            <td><a class="btn-floating  waves-effect waves-light orange"><i
                                        class="material-icons">mode_edit</i></a>
                                <a class="btn-floating  waves-effect waves-light red"><i
                                        class="material-icons">delete</i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row container center">
            {{ $products->links('custom.pagination') }}
        </div>
    </div>

@endsection
