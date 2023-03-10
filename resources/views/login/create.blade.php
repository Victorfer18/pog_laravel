
@if ($errors->any())
    @foreach ($errors->all() as $e)
        {{$e}}<br>
    @endforeach
@endif
<body style="background: #fff9e7;">
    <div class="" style="max-width: 800px; margin: 0 auto;">
        <div style="display: flex; justify-content: center; margin-top: 18%">
           <div style="background: #f3423d;padding: 20px 25px;border-radius: 20px;color: #fff;width: 50%;font-size: 30px; font-family: sans-serif;">
                <div style="display: flex; justify-content: center">
                    <h2>Cadastro</h2>
                </div>
                <form action="{{route('users.store')}}" method="POST" class="">
                    @csrf
                    Nome: <br> <input type="text" name="firstName" id="" value="Gabriel" style="
                    height: 45px;
                    width: 100%;
                    border-radius: 7px;
                    border: none;
                    outline: none;
                "><br>
                <br>
                    Sobrenome: <br> <input type="text" name="lastName" id="" value="Niime" style="
                    height: 45px;
                    width: 100%;
                    border-radius: 7px;
                    border: none;
                    outline: none;
                "><br>
                <br>
                Email: <br> <input type="email" name="email" id="" value="gabrielniime@gmail.com" style="
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
                "><br>
                <div>
                    <button type="submit" style="
                    height: 50px;
                    width: 100%;
                    font-size: 23px;
                    background: #00df00;
                    border: transparent;
                    border-radius: 8px;
                    color: #fff;
                    margin-top: 25px;
                "> Cadastrar </button>
                </div>
                </form>
           </div>
        </div>
    </div>

</body>
