<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title -->
    <title>Lakshmiesevsi.com</title>
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <!-- Plugins File -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <!-- Master Stylesheet [If you remove this CSS file, your file will be broken undoubtedly.] -->
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">

</head>

<body class="login-area">

    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader-book">
            <div class="inner">
                <div class="left"></div>
                <div class="middle"></div>
                <div class="right"></div>
            </div>
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div>
    <!-- /Preloader -->

    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="main-content- h-100vh">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-sm-10 col-md-7 col-lg-5">
                    <!-- Middle Box -->
                    <div class="middle-box">
                        <div class="card-body">
                            <div class="log-header-area card p-4 mb-4 text-center">
                                <h5>Welcome Back !</h5>
                                <p class="mb-0">Sign in to continue.</p>
                            </div>

                            <div class="card">
                                <div class="card-body p-4">
                                    <form action="{{ route('login.custom') }}" method="POST">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label class="text-muted" for="email">Email address</label>
                                            <input class="form-control" name="email" type="email" id="email"
                                                placeholder="Enter your email">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="text-muted" for="password">Password</label>
                                            <input class="form-control" name="password" type="password" id="password"
                                                placeholder="Enter your password">
                                        </div>

                                        <div class="form-group mb-3">
                                            <button class="btn btn-primary btn-lg w-100" type="submit">Sign In</button>
                                        </div>

                                        <div class="text-center">
                                            <span class="me-1">Don't have an account?</span>
                                            <a class="fw-bold" href="{{ url('register') }}">Register</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->

    <!-- Must needed plugins to the run this Template -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/default-assets/setting.js') }}"></script>
    <script src="{{ asset('assets/js/default-assets/scrool-bar.js') }}"></script>
    <script src="{{ asset('assets/js/todo-list.js') }}"></script>

    <!-- Active JS -->
    <script src="{{ asset('assets/js/default-assets/active.js') }}"></script>

</body>

</html>
