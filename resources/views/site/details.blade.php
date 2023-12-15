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

            <div class="row">
                <div class="col m9">
                    <p>Category: {{ $product->getCategory->name }} <br> 
                        By: {{ $product->getUser->name }} /
                        {{ $product->created_at }}</p>
                </div>
                <div class="col m3">
                    <button class="btn orange btn-large">Compar</button>
                </div>
            </div>

        </div>
    </div>
@endsection
