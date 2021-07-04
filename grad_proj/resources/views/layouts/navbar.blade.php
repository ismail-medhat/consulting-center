@php
$settings = DB::table('settings')->first();
@endphp

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom: 2px solid #0a53e6;">
    <img src="{{ asset( $setting->logo) }}" class="img-thumbnail"
        style="width: 40px;height: 40px;margin-right: 8px;">
    <a class="navbar-brand" href="{{ URL::to('/') }}"><span style="color: red">Consulting</span>
        <apan style="color: #0a53e6">Center</apan>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>



    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('/') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('view.posts') }}">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('aboute.us') }}">Aboute Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>


        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>