<!DOCTYPE html>
<html lang="en">
@include('includes/head')
@include('includes/menu')
<body>
    <div id="app">
        @yield('content')
    </div>
    <script src="/js/app.js"></script>
</body>
<footer>
    @include('includes/footer')
</footer>
</html>
