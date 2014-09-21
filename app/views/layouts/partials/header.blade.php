<nav class="main-nav">
    <ul>
        @if($activeUser)
            <li>{{ HTML::linkRoute('user.history', 'Url Shortener') }}</li>
        @else
            <li>{{ HTML::linkRoute('home', 'Url Shortener') }}</li>
        @endif
    </ul>

    <ul>
        @if($activeUser)
            <li>You are registered as {{ $activeUser->username }}</li>
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