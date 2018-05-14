

<nav>
    <ul id="main-navigation" class="nav px-3 py-4 {{ !Auth::guard('web')->check() ? 'justify-content-center' : '' }}">
        @auth
        <div class="dropdown">
            <button class="btn dark-green dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i> {{ mb_strlen(Auth::user()->name) > 20 ? substr(Auth::guard('web')->user()->name, 0, 19) . '...' : Auth::guard('web')->user()->name }}
            </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a href="{{ route('tasks.index') }}" class="dropdown-item"><i class="fas fa-pencil-alt"></i> Моят бележник</a>
            <a href="{{ route('profile.show', Auth::guard('web')->user()->id) }}" class="dropdown-item"><i class="fas fa-user-circle"></i> Моят профил</a>
            <a href="{{ route('questions.index') }}" class="dropdown-item"><i class="far fa-question-circle"></i> Моите въпроси</a>
            <a href="{{ route('contact') }}" class="dropdown-item"><i class="fas fa-envelope"></i> Обратна връзка</a>
            <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout') }}}">Излез<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form></a>
        </div>
        </div>
        @endauth
        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Влез</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Регистрирай се</a>
        </li>
        @endguest
        @foreach($allCategories as $category)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.sort', $category->id) }}">{{ $category->name }}</a>
        </li>
        @endforeach
    </ul>
</nav>