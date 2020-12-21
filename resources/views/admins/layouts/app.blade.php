<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    {{-- 로봇접근차단. --}}
    <META NAME=”ROBOTS” CONTENT=”NOINDEX, NOFOLLOW”>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="서일대학교 캠퍼스타운">
    <meta name="subject" content="서일대학교 캠퍼스타운">
    <meta name="keywords" content="서일대학교,서일대학교 캠퍼스타운,캠퍼스타운">
    <meta name="generator" content="laravel">
    <meta name="author" content="제작자">
    <meta name="copyright" content="서일대학교">
    <meta name="publisher" content="서일대학교 캠퍼스타운">
    <meta name="other Agent" content="공란">
    <meta name="classification" content="캠퍼스타운">
    <meta name="reply-to(email)" content="dev@kspark.link">
    <meta name="location" content="서일대학교">
    <meta name="distribution" content="박경서">
    <meta name="robots" content="all">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title'){{ config('app.name') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('admins/css/fontawesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="{{ asset('admins/css/admin.min.css') }}">
    @yield('style')
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('admins.layouts.header')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @yield('content')
            </div>
            @include('admins.layouts.footer')
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
    @hasSection('summnernote')
        @yield('summnernote')
    @else
        <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('admins/js/admin.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('admins/js/bootstrap-notify.js') }}"></script>
    @endif
    @yield('script')

    @if ($message = Session::get('success'))
    <script>
        $(function () {
            color = 'success';
            $.notify({
                icon: "nc-icon nc-bell-55",
                message: "{{ $message }}"
            }, {
                type: color,
                timer: 3000,
                placement: {
                    from: 'top',
                    align: 'right'
                }
            });
        });

    </script>
    @endif
    @if ($message = Session::get('error'))
    <script>
        $(function () {
            color = 'danger';
            $.notify({
                icon: "nc-icon nc-bell-55",
                message: "{{ $message }}"
            }, {
                type: color,
                timer: 3000,
                placement: {
                    from: 'top',
                    align: 'right'
                }
            });
        });

    </script>
    @endif
    @if ($message = Session::get('warning'))
    <script>
        $(function () {
            color = 'warning';
            $.notify({
                icon: "nc-icon nc-bell-55",
                message: "{{ $message }}"
            }, {
                type: color,
                timer: 3000,
                placement: {
                    from: 'top',
                    align: 'right'
                }
            });
        });

    </script>
    @endif
</body>

</html>
