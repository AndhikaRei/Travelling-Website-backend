<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('includes.style')

</head>
<body>
    <!-- Navbar -->
    @include('includes.navbar-alternate')

    <!-- Hero Title and Content -->
    @yield('content')

    {{-- script --}}
    @include('includes.script')
</body>
</html>