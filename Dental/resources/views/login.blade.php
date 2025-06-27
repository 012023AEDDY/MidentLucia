 <!--cambiando el boton de login y registro-->
                          
                            @if (Route::has('login'))
            <nav class="d-flex">
                @auth
                    <a class="btn btn-primary rounded-pill text-white py-2 px-4 ms-2 flex-wrap flex-sm-shrink-0" href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a class="btn btn-primary rounded-pill text-white py-2 px-4 ms-2 flex-wrap flex-sm-shrink-0" href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a class="btn btn-primary rounded-pill text-white py-2 px-4 ms-2 flex-wrap flex-sm-shrink-0" href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </nav>
        @endif
