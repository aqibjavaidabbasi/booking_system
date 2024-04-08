<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-layout-mode="dark" data-body-image="img-1" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Booking Meeting</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- fullcalendar css -->
    <link href="{{ asset('assets/libs/fullcalendar/main.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        ::-webkit-scrollbar {
            width: 10px;
            /* Set the width of the scrollbar */
        }

        /* Track */

        ::-webkit-scrollbar-track {
            background: transparent;
            /* Set the background color of the scrollbar track */
        }

        /* Handle */

        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.5);
            /* Set the color of the scrollbar handle */
            border-radius: 5px;
            /* Set the border radius of the scrollbar handle */
        }

        /* Handle on hover */

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.7);
            /* Set the color of the scrollbar handle on hover */
        }
    </style>
    {{-- second style --}}
    {{-- <style>
        /* For WebKit-based browsers */

         ::-webkit-scrollbar {
            width: 10px;
            /* Set the width of the scrollbar */
        }
        /* Track */

         ::-webkit-scrollbar-track {
            background: transparent;
            /* Set the background color of the scrollbar track */
        }
        /* Handle */

         ::-webkit-scrollbar-thumb {
            background: black;
            /* Set the color of the scrollbar handle */
            border-radius: 5px;
            /* Set the border radius of the scrollbar handle */
        }
        /* Handle on hover */

         ::-webkit-scrollbar-thumb:hover {
            background: rgba(0, 0, 0, 0.7);
            /* Set the color of the scrollbar handle on hover */
        }
        /* Media query for light mode */

        @media (prefers-color-scheme: light) {
            /* Set scrollbar color to black */
             ::-webkit-scrollbar-thumb {
                background: black;
            }
        }
        /* Media query for dark mode */

        @media (prefers-color-scheme: dark) {
            /* Set scrollbar color to transparent */
             ::-webkit-scrollbar-thumb {
                background: transparent;
            }
        }
    </style> --}}

</head>

<body>
    <div id="app">
        <app-component></app-component>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>

    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <!-- calendar min js -->
    <script src="{{ asset('assets/libs/fullcalendar/main.min.js') }}"></script>

    <!-- Calendar init -->
    <script src="{{ asset('assets/js/pages/calendar.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>
