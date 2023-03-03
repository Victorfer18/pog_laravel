@section('tittle', 'Login')
@if ($mesagem = Session::get('erro'))
    {{$mesagem}}
@endif
@if ($errors->any())
    @foreach ($errors->all() as $e)
        {{$e}}<br>
    @endforeach
@endif
<body style="background: #fff9e7;">
    <div class="" style="max-width: 800px; margin: 0 auto;">
        <div style="display: flex; justify-content: center; margin-top: 25%">
           <div style="background: #f3423d;padding: 50px 25px;border-radius: 20px;color: #fff;width: 50%;font-size: 30px; font-family: sans-serif;">
                <div style="display: flex; justify-content: center">
                    <h2>Curso Laravel</h2>
                </div>
                <form action="{{route('login.auth')}}" method="POST" class="">
                    @csrf
                    Email: <br> <input type="email" name="email" id="" value="victorfernandomagalhaes@gmail.com" style="
                    height: 45px;
                    width: 100%;
                    border-radius: 7px;
                    border: none;
                    outline: none;
                "><br>
                <br>
                    Senha: <br> <input type="password" name="password" id="" value="1234567890" style="
                    height: 45px;
                    width: 100%;
                    border-radius: 7px;
                    border: none;
                    outline: none;
                ">
                <br>
                <div style="font-size: 20px; margin-top: 10px">
                    <input type="checkbox" name="remember" id=""> Lembrar-me
                </div>
                <div style="display: grid;">
                    <button type="submit" style="
                    height: 50px;
                    width: 100%;
                    font-size: 23px;
                    background: #00df00;
                    border: transparent;
                    border-radius: 8px;
                    color: #fff;
                    margin-top: 25px;
                "> Entrar </button>
                <br>
                <div style="display: flex; justify-content: center">
                    <a href="{{route('login.create')}}"> Cadastre-se </a>
                </div>
                </form>
           </div>
        </div>
    </div>

</body>
