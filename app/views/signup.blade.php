<b>Tüm alanlar zorunludur (*)</b>
<div style="margin: 5px;">{{HTML::link('/login', 'Giriş yap!')}} veya {{HTML::link('/posts', 'Ders Listesi')}}'ne geri dön..</div>
{{Form::open()}}
{{Form::label('Kullanıcı adı:')}}
{{Form::text('username')}}*En az 5 karakter<br/>
{{Form::label('Şifre')}}
{{Form::password('password')}}* En az 8 karakter
{{Form::password('password2', array('placeholder'=> 'aynı şifre tekrar'))}}*<br/>
{{Form::label('E-posta')}}
{{Form::text('email')}}*<br/>
{{Form::submit('Üye ol!')}}
{{Form::close()}}
@foreach($errors->all() as $error)
    {{$error}} <br/>
@endforeach