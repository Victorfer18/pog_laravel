@extends('site.layout')
@section('tittle', 'Carrinho')
@section('conteudo')
{{-- Coments --}}

<div class="row container">
    @if ($mensagem = Session::get('sucesso'))

        <div class="card green darken-1">
            <div class="card-content white-text">
              <span class="card-title">Parabéns</span>
              <p>{{$mensagem}}</p>
            </div>
      </div>
    @endif
    <h3>Seu carrinho possui {{$itens->count()}} produtos.</h3>

    @if ($itens->count() == 0)
        <hr>
        <h5>Neunhum produto no carrinho!</h5>
    @else
    <table class="striped">
        <thead>
          <tr>
              <th></th>
              <th>Nome</th>
              <th>Preço</th>
              <th>Quantidade</th>
              <th>Ações</th>
          </tr>
        </thead>

        <tbody>
            @foreach ($itens as $i)
                <tr>
                    <td><img src="{{$i->attributes->image}}" alt="" width="70" class="responsive-img circle"></td>
                    <td>{{$i->name}}</td>
                    <td>R${{number_format($i->price, 2, ',', '.')}}</td>
                    <form action="{{route('site.atualizacarrinho')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <td><input style="width: 40px; font-weight: 900;" min="1" class="white center" type="number" name="quantity" id="" value="{{$i->quantity}}"> </td>
                        <input type="hidden" name="id" value="{{$i->id}}">
                        <td>
                        <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
                    </form>
                        <form action="{{ route('site.removecarrinho')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$i->id}}">
                            <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      <h5>Valor total: R${{number_format(\Cart::getTotal(), 2, ',', '.')}}</h5>
    @endif

  <br>
  <div class="row container center">
    <a href="{{route('site.index')}}" class="btn waves-effect waves-light blue"> Continuar comprando <i class="material-icons rigth">arrow_back</i></a>
    <a href="{{route('site.clearcarrinho')}}" class="btn waves-effect waves-light blue"> Limpar carrinho <i class="material-icons rigth">clear</i></a>
    <button class="btn waves-effect waves-light green"> Finalizar pedido <i class="material-icons rigth">check</i></button>
  </div>
</div>

@endsection
