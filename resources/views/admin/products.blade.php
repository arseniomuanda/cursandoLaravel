@extends('admin.layout')
@section('title', 'Admin - Produtos')
@section('content')
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large bg-gradient-green modal-trigger" href="#addProduct">
            <i class="large material-icons">add</i>
        </a>
    </div>


    @include('components.admin.products.create')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    @endif

    <div class="row container crud">
        <div class="row titulo ">
            <h1 class="left">Produtos</h1>
            <span class="right chip">{{ $count }} produtos cadastrados</span>
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
                            <td><a class="btn-floating  waves-effect waves-light orange modal-trigger"
                                    href="#edit-{{ $item->id }}"><i class="material-icons">mode_edit</i></a>
                                <a class="btn-floating  waves-effect waves-light red modal-trigger"
                                    href="#delete-{{ $item->id }}"><i class="material-icons">delete</i></a>
                            </td>
                            @include('components.admin.products.edit', ['product' => $item])
                            @include('components.admin.products.delete', ['product' => $item])
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
