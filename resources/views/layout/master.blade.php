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
        <link href="{{asset('assets\libs\datatables\dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets\libs\datatables\buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets\libs\datatables\responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets\libs\datatables\select.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <!-- App css -->
        <link href="{{asset('assets\css\bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
        <link href="{{asset('assets\css\icons.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets\css\app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet">

        @yield('style')
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <!-- LOGO -->
            </div>
            <!-- end Topbar --> 
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">
                    {{-- <div class="user-box">
                        <div class="float-left">
                            <img src="{{asset('assets\images\users\avatar-1.jpg')}}" alt="" class="avatar-md rounded-circle">
                        </div>
                        <div class="user-info">
                            <a href="#">Stanley Jones</a>
                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div> --}}
    
            <!--- Sidemenu -->
            @include('layout.nav')
            <!-- End Sidebar -->
    
            <div class="clearfix"></div>

    
                </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start container-fluid -->
                    <div class="container-fluid">

                        <!-- start  -->
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <h4 class="header-title mb-3"></h4>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

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

        <!-- Required datatable js -->
        <script src="{{asset('assets\libs\datatables\jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets\libs\datatables\dataTables.bootstrap4.min.js')}}"></script>

        <!-- Buttons examples -->
        <script src="{{asset('assets\libs\datatables\dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('assets\libs\datatables\buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets\libs\datatables\dataTables.keyTable.min.js')}}"></script>
        <script src="{{asset('assets\libs\datatables\dataTables.select.min.js')}}"></script>
        <script src="{{asset('assets\libs\jszip\jszip.min.js')}}"></script>
        <script src="{{asset('assets\libs\pdfmake\pdfmake.min.js')}}"></script>
        <script src="{{asset('assets\libs\pdfmake\vfs_fonts.js')}}"></script>
        <script src="{{asset('assets\libs\datatables\buttons.html5.min.js')}}"></script>
        <script src="{{asset('assets\libs\datatables\buttons.print.min.js')}}"></script>

        <!-- Responsive examples -->
        <script src="{{asset('assets\libs\datatables\dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets\libs\datatables\responsive.bootstrap4.min.js')}}"></script>

        <!-- Datatables init -->
        <script src="{{asset('assets\js\pages\datatables.init.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets\js\app.min.js')}}"></script>
        @yield('script')
    </body>

</html>