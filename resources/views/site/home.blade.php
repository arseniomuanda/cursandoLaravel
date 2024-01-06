@extends('site.layout')
@section('title', 'A-Loja')
@section('content')
    <div class="row container">
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
