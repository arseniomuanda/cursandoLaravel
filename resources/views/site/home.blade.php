@extends('site.layout')

@section('title', 'My title')

@section('content')
    <h1>My content hire... </h1>

    <h4>As frutas são:</h4>
    @foreach ($frutas as $fruta)
        {{ $fruta }}<br>
    @endforeach

    
@endsection

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