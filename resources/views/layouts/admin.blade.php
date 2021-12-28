<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @include('includes.style')

</head>

<body>
    @include('includes.admin.navbar')
    <div class="py-5">
        @yield('content')
    </div>
    @include('includes.footer')
    @include('includes.script')
</body>

</html>