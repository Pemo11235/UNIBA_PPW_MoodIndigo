<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('include.head')
    @yield('styles') 
</head>
<body>

<header>
    @include('include.header')

</header>

<div class="grid-container">
    <div class="side1">@yield('content1') </div>
    <div class="contenuto" >
    @yield('content')    
    </div>   
    <div class="side2"></div>

</div>
@include('include.footer')


</body>
</html>
