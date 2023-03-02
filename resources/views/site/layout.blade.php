<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tittle')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js" defer></script>
</head>
<body style="background: #fff9e7;">
    <ul id='dropdown1' class='dropdown-content'>
        @foreach ($categoriasMenu as $i)
            <li><a href="{{route('site.categoria', $i->id)}}"><i class="material-icons">cloud</i>{{$i->name}}</a></li>
        @endforeach
    </ul>
    <ul id='dropdown2' class='dropdown-content'>
        <li><a href="{{route('admin.dashboard')}}"><i class="material-icons">dashboard</i>Dashboard</a></li>
        <li><a href="{{route('login.logout')}}"><i class="material-icons">power_settings_new</i>Sair</a></li>
    </ul>
    <nav class="red">
        <div class="nav-wrapper container">
          <a href="{{route('site.index')}}" class="brand-logo center" >Curso Laravel</a>
        @auth
            <ul id="nav-mobile" class="left">
                <li><a href="#" class="dropdown-trigger" data-target="dropdown2">Olá {{auth()->user()->firstName}}<i class="material-icons right">expand_more</i> </a></li></a></li>
            </ul>
        @else
            <ul id="nav-mobile" class="left">
                <li><a href="{{route('login.form')}}" >Login<i class="material-icons right">lock</i> </a></li></a></li>
            </ul>
        @endauth
          <ul id="nav-mobile" class="right">
            <li><a href="{{route('site.index')}}">Home</a></li>
            <li><a href="" class="dropdown-trigger" data-target="dropdown1">Categorias<i class="material-icons right">expand_more</i> </a></li></a></li>
            <li><a href="{{route('site.carrinho')}}">Carrinhos <span class="new badge blue" data-badge-caption=""> {{ \Cart::getContent()->count()}} </span></a></li>
          </ul>
        </div>
    </nav>
    <br>
    @yield('conteudo')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var elemDrop = document.querySelectorAll(".dropdown-trigger");
            var instanceDrop = M.Dropdown.init(elemDrop, {
                coverTrigger: false,
                constrainWidth: false
            });
        });

    </script>
</body>
</html>
