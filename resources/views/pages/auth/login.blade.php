<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Login | Giải pháp 2022</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Giải pháp Bằng Trường Corp 2022" name="description">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
        <!-- App css -->
        <link href="{{asset('assets\css\bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
        <link href="{{asset('assets\css\icons.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets\css\app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet">
    </head>

    <body>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mb-4 mt-3">
                                    <a href="\">
                                        <span><img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="30"></span>
                                    </a>

                                </div>
                                @if (Session::has('msg'))
                                        <center><span class="text-danger">{{Session::get("msg")}}</span></center>
                                @endif
                                <form action="{{route('login')}}" class="p-2" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="emailaddress">Email</label>
                                        <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="john@deo.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mật khẩu</label>
                                        <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                                    </div>

                                    <div class="mb-3 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Đăng nhập </button>
                                    </div>
                                </form>
                            </div>
                            <!-- end card-body -->
                        </div>
                        
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
    </body>

</html>