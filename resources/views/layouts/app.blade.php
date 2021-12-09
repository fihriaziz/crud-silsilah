<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.meta')
    @include('layouts.style')
    <title>@yield('title')</title>
</head>
<body>
    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>
@include('layouts.script')
</body>
</html>
