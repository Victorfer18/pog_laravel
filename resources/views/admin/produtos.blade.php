@extends('admin.layout')
@section('tittle', 'Produtos')
@section('conteudo')

<div class="fixed-action-btn">
    <a  class="btn-floating btn-large bg-gradient-green modal-trigger" href="#modal1">
      <i class="large material-icons">add</i>
    </a>
  </div>

   <!-- Modal Structure -->
   <div id="modal1" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">card_giftcard</i> Novo produto</h4>
      <form class="col s12">
        <div class="row">
            <div class="input-field col s6">
              <input placeholder="Nome" id="first_name" type="text" class="validate">
              <label for="first_name">Nome:</label>
            </div>
            <div class="input-field col s6">
                <input placeholder="Descrição" id="first_name" type="text" class="validate">
              <label for="description">Descrição:</label>
            </div>
            <div class="input-field col s6">
                <input placeholder="Preço" id="first_name" type="number" class="validate">
                <label for="price">Preço:</label>
            </div>
            <div class="input-field col s6">
                <input placeholder="Imagem" id="first_name" type="text" class="validate">
                <label for="image">Imagem:</label>
            </div>

          <div class="input-field col s12">
            <select>
              <option value="" disabled selected>Selecione</option>
              @foreach ($categorias as $i)
                <option value="{{$i->id}}">{{$i->name}}</option>
              @endforeach
            </select>
            <label>Selecione a Categoria:</label>
          </div>

        </div>

        <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cadastrar</a><br>
    </div>

  </form>
  </div>




    <div class="row container crud">

            <div class="row titulo ">
              <h1 class="left">Produtos</h1>
              <span class="right chip">{{$produtos->count()}} produtos cadastrados</span>
            </div>

           <nav class="bg-gradient-blue">
            <div class="nav-wrapper">
              <form>
                <div class="input-field">
                  <input placeholder="Pesquisar..." id="search" type="search" required>
                  <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                  <i class="material-icons">close</i>
                </div>
              </form>
            </div>
          </nav>

            <div class="card z-depth-4 registros" >
            <table class="striped ">
                <thead>
                  <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                  </tr>
                </thead>

                <tbody>
                    @foreach ($produtos as $i)
                        <tr>
                        <td><img src="{{$i->imagem}}" loading="lazy" class="circle "></td>
                        <td>#{{$i->id}}</td>
                        <td>{{$i->name}}</td>
                        <td>R${{number_format($i->preco, 2, ',', '.')}}</td>
                        <td>{{$i->category->name}}</td>
                        <td><a class="btn-floating  waves-effect waves-light orange"><i class="material-icons">mode_edit</i></a>
                            <a class="btn-floating  waves-effect waves-light red"><i class="material-icons">delete</i></a></td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>

            <ul class="pagination center">
              <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
              <li class="active"><a href="#!">1</a></li>
              <li class="waves-effect"><a href="#!">2</a></li>
              <li class="waves-effect"><a href="#!">3</a></li>
              <li class="waves-effect"><a href="#!">4</a></li>
              <li class="waves-effect"><a href="#!">5</a></li>
              <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            </ul>
    </div>

@endsection
