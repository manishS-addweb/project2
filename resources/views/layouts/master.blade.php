<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand">Dashboard</a>
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit" class="btn-sm btn-primary">Logout</button>
        </form>
    </div>

</nav>
<div class="container">
    @yield('content')

</div>


</body>
</html>
