<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @yield('title_page')
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Default CSS -->
    @section('head')
    @include('web.partials.head')
    @show

    <!-- CSS Page para las paginas a instanciar -->
    @yield('head_page')

</head>

<body class="home-page has-hero">
    <!-- style="background: #d7dede;" -->

    <!-- Header para todas las paginas -->
    @include('web.partials.header')

    @yield('content')
    <!-- Footer para todas las paginas -->
    @include('web.partials.footer')


    <!-- Codigo JS para todas las paginas -->
    @include('web.partials.footer_js')

    @yield('footer_page')

    @stack('scripts')
</body>

<style>
.mobile_responsive1 {
    display: block;
}

.mobile_responsive2 {
    display: none;
}


@media (max-width: 1199px){
    .mobile_responsive1 {
        display: none;
    }

    .mobile_responsive2 {
        display: block;
    }
}

@media only screen and (max-width: 360px) {



}

img {
    max-width: 100%;
    height: auto;
}

</style>

</html>