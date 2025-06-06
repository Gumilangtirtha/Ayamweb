<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page Aplikasi Restoran SMK</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <div class="mt-4">
            <nav class="navbar navbar-expand-sm bg-body-tertiary">
                <div class="container-fluid">
                    <h2>Admin Page</h2>
                    <ul class="navbar-nav gap-5">
                        <li class="nav-item"><a href="">{{ Auth::user()->email }}</a></li>
                        <li class="nav-item"><a href="">Level:{{ Auth::user()->level }}</a></li>
                        <li class="nav-item"><a href="admin/logout">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="col-2">
                <ul class="list-group">
                    @if (Auth::user()->level=='admin')
                        <li class="list-group-item"><a href="">User</a></li>
                    @endif
                    @if (Auth::user()->level=='kasir')
                        <li class="list-group-item"><a href="">Order</a></li>
                        <li class="list-group-item"><a href="">Order Detail</a></li>
                        @endif
                    @if (Auth::user()->level=='manager')
                        <li class="list-group-item"><a href="">Kategori</a></li>
                        <li class="list-group-item"><a href="">Menu</a></li>
                        <li class="list-group-item"><a href="">Pelanggan</a></li>
                        <li class="list-group-item"><a href="">Order</a></li>
                        <li class="list-group-item"><a href="">Order Detail</a></li>
                    @endif
                </ul>
            </div>
            <div class="col-10">
                @yield('admincontent')
            </div>
        </div>
    </div>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>