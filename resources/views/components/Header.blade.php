<header>
    <div class="container">
        <a href="{{ route('home') }}">
            <h1>Library</h1>
        </a>
        <ul class="menu">
            @guest
                <li class="menu-item">
                    <a href="{{ route('sign_in') }}">Войти</a>
                </li>
            @endguest
            @auth
                <li class="menu-item">
                    <a href="{{ route('create_book') }}">Добавить книгу</a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('logout') }}">Выйти</a>
                </li>
            @endauth
        </ul>
    </div>
</header>
