<nav class="main-nav">
    <ul>
        <li>{{ HTML::linkRoute('home', 'Url Shortener') }}</li>
    </ul>

    <ul>
        @if($activeUser)
            <li>You are logged in as {{ $activeUser->username }}</li>
            <li>{{ HTML::linkRoute('user.history', 'History') }}</li>
            <li>{{ HTML::linkRoute('user.settings', 'Settings') }}</li>
            <li>{{ HTML::linkRoute('logout', 'Logout') }}</li>
        @else
            <li>
                @include('layouts.partials.login-form')
            </li>
            <li>{{ HTML::linkRoute('register', 'Register') }}</li>
        @endif
    </ul>
</nav>