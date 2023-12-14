@extends('site.layout')
@section('title', 'Detalhes')
@section('content')
    <div class="row container">
        <div class="col s12 m6">
            <img src="{{ $product->image }}" class="responsive-img" alt="" srcset="">
        </div>
        <div class="col s12 m6">
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->description }}</p>
            <button class="btn orange btn-large">Compar</button>
        </div>
    </div>
@endsection