@extends('site.layout')
@section('title', 'A-Loja')
@section('content')
    <div class="row container">
        @forelse ($products as $product)
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                         <img src="{{ url("storage/$product->image") }}">
                        
                        {{-- Existe ainda o cannot --}}
                        {{-- @can('ver-produto', $product) --}}
                            <a href="{{ route('site.details', $product->slug) }}"
                                class="btn-floating halfway-fab waves-effect waves-light red"><i
                                    class="material-icons">visibility</i></a>
                       {{-- ca@endcan --}}
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
