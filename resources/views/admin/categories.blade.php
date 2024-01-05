@extends('admin.layout')
@section('title', 'Admin - Categorias')
@section('content')
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large bg-gradient-green modal-trigger" href="#addProduct">
            <i class="large material-icons">add</i>
        </a>
    </div>


    @include('components.admin.categories.create')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    @endif

    <div class="row container crud">
        <div class="row titulo ">
            <h1 class="left">Categoria</h1>
            <span class="right chip">{{ $count }} categorias cadastradas</span>
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
            @if ($message = Session::get('success'))
                @include('components.messages.success', ['message' => $message])
            @endif

            <table class="striped ">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <td><img src="{{ url("storage/$item->logo") }}" class="circle " width="40" height="40">
                            </td>
                            <td>#{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ Str::limit($item->description, 20, '...') }}</td>
                            <td><a class="btn-floating  waves-effect waves-light orange modal-trigger"
                                    href="#edit-{{ $item->id }}"><i class="material-icons">mode_edit</i></a>
                                <a class="btn-floating  waves-effect waves-light red modal-trigger"
                                    href="#delete-{{ $item->id }}"><i class="material-icons">delete</i></a>
                            </td>
                            @include('components.admin.categories.edit', ['category' => $item])
                            @include('components.admin.categories.delete', ['category' => $item])
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row container center">
            {{ $categories->links('custom.pagination') }}
        </div>
    </div>

@endsection
