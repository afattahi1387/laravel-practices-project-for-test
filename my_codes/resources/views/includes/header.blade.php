<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="border-radius: 0px;">
    <div class="container">
        <a class="navbar-brand" style="direciton: rtl;" href="{{ env('APP_URL') }}">{{ env('APP_NAME') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @if(Auth::check())
                    <li class="nav-item"><a style="text-decoration: none;" class="nav-link" href="{{ route('dashboard') }}">داشبورد</a></li>
                    <li class="nav-item"><a class="nav-link"></a></li>
                    <li class="nav-item"><a style="text-decoration: none;" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout_form').submit();" href="{{ route('logout') }}">خروج</a></li>
                    <form action="{{ route('logout') }}" id="logout_form" method="POST">
                        {{ csrf_field() }}
                    </form>
                @else
                    <li class="nav-item"><a style="text-decoration: none;" class="nav-link" href="{{ route('login') }}">ورود</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
