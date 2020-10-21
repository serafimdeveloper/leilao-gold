<h1>Bem vindo, {{$data['nome']}}</h1>
<br>
<img src="{{url('/imagens/mails/logo.jpg')}}" width="300px" height="200px" />
<br>
Seja bem vindo ao Leilão Gold. 
<br>
<a href="{{url('/api/auth/confirm/email/'.$data['email'].'/confirm_token/'.$data['confirm_token'])}}">Confirma sua conta</a>