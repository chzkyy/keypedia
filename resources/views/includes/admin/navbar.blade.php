<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">KEYPEDIA</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @endguest

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false">Category</a>
                        <ul class="dropdown-menu">
                            <li>
                                @foreach ($categories as $category)
                                <a class="dropdown-item" href="{{ route('category',[$category->id]) }}" > {{ $category->category }}</a>
                                @endforeach
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false">{{ Auth::user()->roles }}</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('addkeyboard') }}">
                                    Add Keyboard
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('managecategory') }}">
                                    Manage Category
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('change_password') }}">
                                    {{ __('Change Password') }}
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        echo date('D, d-M-Y');
                        ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
