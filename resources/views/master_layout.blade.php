<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.head')
</head>

<body>
    @include('layout.header')

    <!-- Page Content -->
    <div class="container">
        @yield('content')
    </div>
    <!-- end Page Content -->

    @include('layout.footer')
    @include('layout.foot')
</body>

</html>
