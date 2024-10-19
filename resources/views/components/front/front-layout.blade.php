@props([
    'uses_livewire'                     =>false,
    'footer_scripts'                    =>'',
    'header_styles'                     =>'',
])

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{ $title ?? config('app.name') }}</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />
    <!-- ========================= CSS here ========================= -->
    <x-front.header-styles />
    {{ $header_styles}}
    @isset($uses_livewire)
        @livewireStyles
    @endisset

</head>

<body>
    <!--[if lte IE 9]>
    <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
    </p>
    <![endif]-->

    <!-- Preloader -->
    <x-front.preloader />
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <x-front.header-nav />
    <!-- End Header Area -->
    {{$breadcrumb ?? ''}}

    {{ $slot }}

    <!-- Start Footer Area -->
    <x-front.footer />
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <x-front.footer-scripts />

    {{ $footer_scripts }}

    @isset($uses_livewire)
        @livewireScripts
    @endisset

</body>

</html>
