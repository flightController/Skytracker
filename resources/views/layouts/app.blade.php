<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes/head')
</head>
<body>
    <div class="container">
    @include('includes/menu')
    <div class="row" id="app">
        @yield('content')
    </div>
    </div>
    <!--<script src="/js/app.js"></script> !-->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="/js/lightbox.js"></script>

</body>
</html>
