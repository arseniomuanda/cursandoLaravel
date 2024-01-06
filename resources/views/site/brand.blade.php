@extends('site.layout')
@section('title', "A-Loja - $brand->name")
@section('content')
    <div class="row container">
        <h4>Marca: {{ Str::ucfirst($brand->name) }}</h4>
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
