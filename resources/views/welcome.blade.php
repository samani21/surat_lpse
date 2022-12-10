<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ef1603951a.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    @include('sweetalert::alert')
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-secondary shadow-sm">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    <h3>{{ config('app.name', 'Surat') }}</h3>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                           
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        <form action="{{route('cari')}}" method="get">
        <div class="container">
            <div class="row">
                <div class="col">
                <input class="form-control" type="text" name="cari" placeholder="Cari surat berdasarkan no surat" aria-label="default input example">
                </div>
                <div class="col col-lg-3">
                    <button type="submit" class="btn btn-primary">Cari</button>
                <!-- <a href="" class="btn btn-primary">Cari Surat</a> -->
                <a href="surat_masuk/kirim" class="btn btn-success">Kirim Surat</a>
                </div>
            </div>
            </div>
        </form>
        <br>
        <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table">
                <thead class="table-secondary">
                    <tr align="center">
                    <th scope="col">#</th>
                    <th scope="col">No Surat</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Sumber</th>
                    <th scope="col">Judul</th>
                    <th scope="col"align="center" >Status</th> 
                    <th scope="col">Aksi</th> 
                </tr>
                </thead>
                <tbody>
                    @php 
                        $no=1;
                    @endphp
                    @foreach($surat as $sur)
                        <tr align="center">
                            <td>{{ $no++ }}</td>
                            <td>{{$sur->id_surat}}</td>
                            <td>{{$sur->tgl_surat}}</td>
                            <td>{{$sur->sbr_surat}}</td>
                            <td>{{$sur->jdl_surat}}</td>
                            <td align="center" ><?php if($sur->status =='1'){
                               echo '<span class="badge bg-success">Sudah dibelas</span>';
                            }if($sur->status =='0'){
                                echo '<span class="badge bg-danger">Belum dibelas</span>';
                             }?></td>
                            <td align="right" width="300">
                                <a href="{{asset ('file/'.$sur->nm_file)}}" class="btn btn-success" download=""><i class="fa-sharp fa-solid fa-download"></i> Surat</a>
                                <a href="{{asset ('file/'.$sur->file_balasan)}}" class="btn btn-primary" download="" style="
                                <?php if($sur->file_balasan =="-"){
                                    echo 'pointer-events: none';
                                 }else{
                                echo '';
                             }?>"><i class="fa-sharp fa-solid fa-download"></i> balasan</a>
                                <a href="/surat_masuk/edit/{{$sur->id}}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="hapus_surat/{{$sur->id}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
        </main>
    </div>
</body>
</html>
