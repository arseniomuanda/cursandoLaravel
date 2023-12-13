@extends('site.layout')

@section('title', 'My title')

@section('content')
    <h1>My content hire... </h1>

    @include('includs.mensagem', ['title'=> 'Mensagem de sucesso', 'body'=> "Olá meu nume é Arsénio"])

    @component('components.sidebar')
        @slot('paragrafo')
            Texte vindo do slote;
        @endslot
    @endcomponent


@endsection

@push('style')
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
@endpush

@push('script')
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
@endpush

{{-- Aqui está uma lista de alguns comandos do Blade no Laravel:

@extends: Usado para estender um layout mestre em uma visualização.
@section: Usado para definir uma seção de conteúdo em um layout mestre ou visualização.
@yield: Usado para exibir o conteúdo de uma seção definida em um layout mestre.
@include: Usado para incluir uma subvisualização em uma visualização.
@if, @elseif, @else: Usados para adicionar estruturas condicionais em uma visualização.
@foreach, @for, @while: Usados para adicionar estruturas de repetição em uma visualização.
@isset, @empty: Usados para verificar se uma variável está definida ou vazia.
@auth, @guest: Usados para verificar se o usuário está autenticado ou não.
@component: Usado para renderizar um componente Blade.
@stack: Usado para empilhar conteúdo em uma seção específica.
Esses são apenas alguns dos comandos mais comumente usados no Blade do Laravel. Existem muitos outros comandos e recursos disponíveis para ajudar na criação de visualizações dinâmicas e reutilizáveis. --}}
