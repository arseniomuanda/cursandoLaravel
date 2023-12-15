@extends('site.layout')
@section('title', 'My title')
@section('content')
    <div class="row container">
        <h3>Categoria: {{ Str::ucfirst($category->name) }}</h3>
        @forelse ($products as $product)
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{ $product->image }}">
                        <a href="{{ route('site.details', $product->id) }}"
                            class="btn-floating halfway-fab waves-effect waves-light red"><i
                                class="material-icons">visibility</i></a>
                    </div>
                    <div class="card-content">
                        <span class="card-title">{{ $product->name }}</span>
                        <p>{{ Str::limit($product->description, 10, '...') }}</p>
                    </div>
                </div>
            </div>
        @empty
            <h2>Lista Vazia</h2>
        @endforelse

    </div>
    <div class="row container center">
        {{ $products->links('custom.pagination') }}
    </div>
@endsection
