<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        
        <title>@php
            $title = '';
            if (isset($categories) && !empty($categories)) {
                $title = $categories->where('id', request()->get('category'))->first();
            }
            if (empty($title)) {
                echo '';
            } else {
                echo $title->name;
            }
        @endphp Giải pháp 2022 {{date('d/m/Y', time())}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Giải pháp Bằng Trường Corp 2022" name="description">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
        <!-- third party css -->
        <!-- App css -->
        <link href="{{asset('assets\css\bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
        <link href="{{asset('assets\css\icons.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets\css\app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet">

        @yield('style')
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">
            <!-- end Topbar --> 
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">
                <!--- Sidemenu -->
                @include('layout.nav')
                <!-- End Sidebar -->
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content mt-5">
                    <!-- Start container-fluid -->
                    <div class="container-fluid">
                        <!-- start  -->
                        @yield('content')
                        <!-- end row -->
                    </div>
                    <!-- end container-fluid -->
                    <!-- Footer Start -->
                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    2022 &copy; Giải pháp <a href="">Longvc</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- end Footer -->

                </div>
                <!-- end content -->

            </div>
            <!-- END content-page -->

        </div>
        <!-- END wrapper -->
        <!-- Vendor js -->
        <script src="{{asset('assets\js\vendor.min.js')}}"></script>
        <!-- App js -->
        <script src="{{asset('assets\js\app.min.js')}}"></script>
        @yield('script')
    </body>

</html>