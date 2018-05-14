<header>
    <a href="{{ url('/') }}">
        <picture>
            <source media="(min-width: 600px)" srcset="{{ asset('images/logo-large.png') }}">
            <source media="(max-width: 600px)" srcset="{{ asset('images/logo-small.png') }}">
            <img class="mx-auto d-block" src="{{ asset('images/logo-large.png') }}"/>
        </picture>
    </a>
</header>
