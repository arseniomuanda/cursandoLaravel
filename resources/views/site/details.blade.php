@extends('site.layout')
@section('title', "A-Loja - $product->name")
@section('content')
    <div class="row container">
        <br>
        <div class="col s12 m6">
            <img src="{{ url("storage/$product->image") }}" class="responsive-img" alt="" srcset="">
        </div>
        <div class="col s12 m6">
            <h5>{{ $product->name }}</h5>
            <h5>AOA {{ number_format($product->price, 2, ',', '.') }}</h5>
            <p>{{ $product->description }}</p>

            <div class="row">
                <div class="col m9">
                    <p><b>Marca:</b> {{ Str::ucfirst($product->getBrand->name) }} <br>
                    <b>Category:</b> {{ Str::ucfirst($product->getCategory->name) }} <br>
                    <b>By:</b> {{ $product->getUser->name }} /
                        {{ $product->created_at }}</p>
                </div>
            </div>

            <form action="{{ route('site.addCart') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product" value="{{ $product->id }}">
                <div class="row">
                    <div class="cal m9">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">content_paste</i>
                            <input id="icon_prefix" name="qtd" type="number" min="1" value="1" class="validate">
                            <label for="icon_prefix">Quatidade</label>
                        </div>
                    </div>
                    <div class="cal m3">
                        <div class="right">
                            <button class="waves-effect waves-light btn-large orange"><i
                                    class="material-icons left">add_shopping_cart</i>Adicionar</button>
                        </div>
                    </div>
                </div>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection
