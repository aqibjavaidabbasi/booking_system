<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-layout-mode="dark" data-body-image="img-1" data-preloader="disable">

<head>

    @include('admin.layouts.head')

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('admin.layouts.header2')
        <!-- ========== App Menu ========== -->
        @include('admin.layouts.sidebar')

        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    @if (session('success'))
                        <div id="success-alert" class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('danger'))
                        <div id="danger-alert" class="alert alert-danger">
                            {{ session('danger') }}
                        </div>
                    @endif
                    <!-- start page title -->
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer border-top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            Meeting Room
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                {{-- Design & Develop by Themesbrand --}}
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    @include('admin.layouts.footer')
    {{-- <script>
        // When the document is ready
        $(document).ready(function() {
            // Check if there's a previously stored mode in session storage
            const storedMode = sessionStorage.getItem('layoutMode');

            // If there's a stored mode, update the layout mode attribute and display an alert
            if (storedMode) {
                document.body.setAttribute('data-layout-mode', storedMode);
                alert('Layout mode stored in session: ' + storedMode);
            }

            // Add event listener to the button after the document is fully loaded
            document.getElementById('layoutModeToggle').addEventListener('click', function() {
                const body = document.body;
                const currentMode = body.getAttribute('data-layout-mode');
                const newMode = currentMode === 'dark' ? 'light' : 'dark';
                body.setAttribute('data-layout-mode', newMode);

                // Store the new mode in session storage
                sessionStorage.setItem('layoutMode', newMode);

                // Display an alert with the updated mode
                alert('Layout mode changed to ' + newMode);
            });
        });
    </script> --}}
    <script>
        // Function to hide the alert after 5 seconds
        function hideAlerts() {
            var successAlert = document.getElementById('success-alert');
            var dangerAlert = document.getElementById('danger-alert');

            if (successAlert) {
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 5000); // 5000 milliseconds = 5 seconds
            }

            if (dangerAlert) {
                setTimeout(function() {
                    dangerAlert.style.display = 'none';
                }, 5000); // 5000 milliseconds = 5 seconds
            }
        }

        // Call the hideAlerts function when the page is loaded
        window.onload = hideAlerts;
    </script>
</body>

</html>
