<nav class="main-nav">
    <ul>
        <li>{{ HTML::linkRoute('home', 'Url Shortener') }}</li>
    </ul>

    <ul>
        <li>
            {{ Form::open(['route' => 'login']) }}
               	{{ Form::email('email', null, ['placeholder' => 'email']) }}
               	{{ $errors->first('email', '<span class="error">:message</span>') }}

               	{{ Form::password('password', ['placeholder' => 'password']) }}
               	{{ $errors->first('password', '<span class="error">:message</span>') }}

               	{{ Form::submit('Login') }}
            {{ Form::close() }}
        </li>
        <li>{{ HTML::linkRoute('register', 'Register') }}</li>
    </ul>
</nav>