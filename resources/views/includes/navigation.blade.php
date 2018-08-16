<div class="top-right links">
        <a {{ Request::route()->getName() == 'welcome' ? "style=color:red;" : "" }} href={{ route('welcome') }}>Welcome</a>
        <a href="{{ route('about') }}">About</a>
</div>