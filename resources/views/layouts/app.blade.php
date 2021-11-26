<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

    <link href="{{ asset('css/sticky-footer.css')}}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Sistem Informasi Akademik
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @else

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cogs"></i> Setting
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/setting"><i class="fas fa-info-circle"></i> Infomasi Kampus</a>
                                    <a class="dropdown-item" href="/tools/sms"><i class="far fa-comment-alt"></i> Kirim SMS</a>
                                    <a class="dropdown-item" href="/tools/whatapps"><i class="fab fa-whatsapp"></i> Kirim Whatapps</a>
                            </div>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="/tahunakademik"><i class="far fa-calendar-check"></i> Tahun Akademik</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/jadwalkuliah"><i class="far fa-calendar-alt"></i> Jadwal Kuliah</a>
                    </li>

                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-tv"></i> Data master
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                 
                                  <a class="dropdown-item" href="/kurikulum"><i class="fas fa-atlas"></i> Kurikulum</a>
                                  <a class="dropdown-item" href="/fakultas"><i class="fas fa-building"></i> Fakultas</a>
                                  <a class="dropdown-item" href="/jurusan"><i class="fas fa-user-md"></i> Jurusan</a>
                                  <a class="dropdown-item" href="/matakuliah"><i class="fas fa-book-open"></i> Matakuliah</a>
                                  <a class="dropdown-item" href="/ruangan"><i class="fas fa-hotel"></i> Ruangan</a>
                                  
                                </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/dosen"><i class="fas fa-user-graduate"></i> Dosen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/mahasiswa"><i class="fas fa-users"></i> Mahasiswa</a>
                        </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user-tag"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="footer">
        <div class="container">
            <marquee><span class="text-muted center"><b>INFORMASI : </>Tahun Akademik Yang Sedang Berjalan : <b>2018 - 2019 Semester Genap</b></span> </marquee>
        </div>
      </footer>
    <!-- jQuery -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- App scripts -->
    @stack('scripts')
</body>
</body>
</html>
