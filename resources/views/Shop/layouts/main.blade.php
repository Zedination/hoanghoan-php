<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="/shop/slick/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/shop/slick/slick/slick-theme.css"/>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/shop/css/global.css">
    <link rel="stylesheet" type="text/css" href="/shop/css/style.css">
    <link rel="stylesheet" type="text/css" href="/shop/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="/shop/css/search.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="icon" href="" type="image/png">
    @yield('css')
    @yield('title')
</head>
<body style="background: #f3f3f3">

@include('Shop.layouts.header')
@yield('content')
{{--@if(!isset($is_detail))--}}
{{--    @include('Shop.layouts.contact')--}}
{{--@endif--}}
<!-- CONTACT -->
@include('Shop.layouts.footer')

</body>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/bf61fecb7c.js" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<!-- JQuery -->
<script type="text/javascript" src="/shop/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/shop/js/jquery-migrate-1.2.1.min.js"></script>
<!-- Slick -->
<script type="text/javascript" src="/shop/slick/slick/slick.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- Script -->
<script type="text/javascript" src="/shop/js/javascript.js"></script>
@yield('my_javascript')
</html>
