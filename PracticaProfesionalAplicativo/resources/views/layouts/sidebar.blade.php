<aside id="sidebar-wrapper" >
    <div class="sidebar-brand" style="background-color: #9AA49F;">
        <img class="navbar-brand-full app-header-logo" src="{{ asset('img/logoAnimal.png') }}" width="75"
             alt="Infyom Logo">
        <a href="{{ url('/') }}"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('img/logoAnimal.png') }}" width="60px" alt=""/>
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('layouts.menu')
    </ul>
</aside>
