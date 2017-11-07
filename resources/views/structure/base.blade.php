<!doctype html>
<html lang="en">
<head>
    @include('structure.head')
</head>

<body>

@include('structure.navbar')

<main role="main">

    @yield('content')

</main>


@include('structure.footer')
@include('structure.scripts')
</body>

</html>