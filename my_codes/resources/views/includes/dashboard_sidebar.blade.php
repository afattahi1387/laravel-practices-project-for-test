<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">صفحات</div>
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    داشبورد
                </a>
                <a class="nav-link" href="{{ route('dashboard.articles.add') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                    افزودن مقاله
                </a>
                <a class="nav-link" href="{{ route('dashboard.articles') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    مقالات
                </a>
                <a class="nav-link" href="{{ route('trash') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-trash"></i></div>
                    سطل زباله
                </a>
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout_form').submit();">
                    <div class="sb-nav-link-icon"><i class="fa fa-sign-out"></i></div>
                    خروج
                </a>
                <form id="logout_form" action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </nav>
</div>
