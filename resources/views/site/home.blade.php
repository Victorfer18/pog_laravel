@extends('site.layout')
@section('tittle', 'Home')
@section('conteudo')
{{-- Coments --}}

<div class="row container">
@foreach ($produtos as $i)
    <div class="col s12 m4">
        <div class="card">
            <div class="card-image">
              <img src="{{$i->imagem}}" loading="lazy">
              @can('ver-produto', $i)
                <a href="{{route('site.details', $i->slug)}}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>
              @endcan
              {{-- @cannot('ver-produto', $i)

              @endcannot --}}
            </div>
            <span class="card-title" style="color: black">{{$i->name}}</span>
            <div class="card-content">
              <p>{{Str::limit($i->descricao, 100)}}</p>
            </div>
        </div>
    </div>
    @endforeach

</div>
<div class="row">
    {{$produtos->links()}}
</div>

@endsection
