@extends('site.layout')
@section('tittle', 'Home')
@section('conteudo')

<div class="row container">
    <div class="col s12 m6">
        <img src="{{$produto->imagem}}" class="responsive-img" alt="">
    </div>
    <div class="col s12 m6">
        <h1>{{$produto->name}}</h1>
        <br>
        <h4>Preço: R${{number_format($produto->preco, 2, ',', '.')}}</h4>
        <p>{{$produto->descricao}}</p>
        <p>Postado por: {{$produto->user->firstName}} <br>
            Categoria: {{$produto->category->name}}
        </p>
        <button class="btn orange btn-large">Comprar</button>
    </div>
</div>

@endsection
