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
        <form action="{{route('site.addcarrinho')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$produto->id}}">
            <input type="hidden" name="name" value="{{$produto->name}}">
            <input type="hidden" name="price" value="{{$produto->preco}}">
            <input type="number" name="qnt" value="1">
            <input type="hidden" name="img" value="{{$produto->imagem}}">
            <button class="btn orange btn-large">Comprar</button>
        </form>
    </div>
</div>

@endsection
