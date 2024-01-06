@extends('site.layout')
@section('title', "A-Loja - $category->name")
@section('content')
    <div class="row container">
        <h4>Categoria: {{ Str::ucfirst($category->name) }}</h4>
        @forelse ($products as $product)
            @include('components.site.productcard', ['product'=> $product])
        @empty
            <h2>Lista Vazia</h2>
        @endforelse

    </div>
    <div class="row container center">
        {{ $products->links('custom.pagination') }}
    </div>
@endsection
