{{HTML::link('/signup', 'Üye Ol!')}} veya {{HTML::link('/posts', 'Ders Listesi')}}'ne geri dön..
{{Form::open()}}
{{Form::label('Kullanıcı Adı:')}}
{{Form::text('username')}}
{{Form::label('Şifre:')}}
{{Form::password('password')}}
{{Form::submit('Giriş Yap')}}
{{Form::close()}}
{{Session::get('error')}}