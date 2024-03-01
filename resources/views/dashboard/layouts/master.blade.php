<!DOCTYPE html>
<html lang="IR-fa" dir="rtl">

@include('dashboard.layouts.head')
<body class="navbar-fixed sidebar-nav fixed-nav">

@include('dashboard.layouts.header')
@include('dashboard.layouts.aside')
<main class="main">
@yield('content')
</main>
@include('dashboard.layouts.footer')
@include('dashboard.layouts.js')
</body>

</html>
