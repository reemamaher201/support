<!doctype html>
<html lang="en">
@include('layout.head')
<body>
<div class="container-scroller">
@include('layout.header')
@yield('content')
@include('layout.footer')
</div>
@include('layout.scripts')
</body>
</html>
