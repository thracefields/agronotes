<nav>
    <ul id="main-navigation" class="nav p-4">
        <div class="dropdown">
            <button class="btn dark-green dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-wrench"></i> {{ mb_strlen(Auth::guard('admin')->user()->name) > 20 ? substr(Auth::guard('admin')->user()->name, 0, 19) . '...' : Auth::guard('admin')->user()->name }}
            </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route('admin.logout') }}">Излез<form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                {{ csrf_field() }}
            </form></a>
        </div>
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">Начало</a>
        </li>
    </ul>
</nav>