<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arsesevai.in</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png">
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>

    <!--plugins-->
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/metismenu/metisMenu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/metismenu/mm-vertical.css') }}">
    <!--bootstrap css-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!--main css-->
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/sass/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/sass/dark-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/sass/blue-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/sass/responsive.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong> {{ session('success') }} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong> {{ session('error') }} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="pricingTable">
                            <span class="pricing-icon"><i class="fa fa-user bg-primary text-white"></i></span>
                            <h6 class="title py-3 m-0 text-primary text-uppercase ">Distributor</h6>

                            <div class="modal-body mb-4">
                                <img src="assets/images/project-logo/project1.jpg" alt="" class="img-fluid">
                            </div>

                            <button type="button" class="btn btn-primary btn-rounded w-100"
                                data-bs-toggle="modal" data-bs-target="#exampleModalform">
                                Distributor
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="pricingTable">
                            <span class="pricing-icon"><i class="fa fa-rocket bg-dark text-light"></i></span>
                            <h6 class="title py-3 m-0 text-dark text-uppercase">Retailler</h6>
                            <div class="modal-body mb-4">
                                <img src="assets/images/project-logo/project2.jpg" alt="" class="img-fluid">
                            </div>
                            <button type="button" class="btn btn-dark btn-rounded w-100" data-bs-toggle="modal"
                                data-bs-target="#retailer">
                                Retailler
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="pricingTable">
                            <span class="pricing-icon"><i class="fa fa-envelope bg-pink text-white"></i></span>
                            <h6 class="title py-3 m-0 text-danger text-uppercase">Customer</h6>
                            <div class="modal-body mb-4">
                                <img src="assets/images/project-logo/project3.jpg" alt="" class="img-fluid">
                            </div>
                            <button type="button" class="btn btn-danger btn-rounded w-100" data-bs-toggle="modal"
                                data-bs-target="#customer">
                                Customer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>

<div class="col-md-6">
    <div class="card">
        <div class="modal fade" id="exampleModalform" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title align-self-center" id="exampleModalform1">Distributor
                            Registeration</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ url('/savedistributorregister') }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="field-1" class="form-label">Name</label>
                                        <input required type="text" name="name" maxlength="30" class="form-control"
                                            placeholder="Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="field-2" class="form-label">Phone</label>
                                        <input required onkeyup="duplicatephone(0)" id="phone" type="text"
                                            name="phone" class="form-control number" id="field-2"
                                            maxlength="10" placeholder="Phone">
                                        <span id="dupphone" style="color:red"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="field-1" class="form-label">Aadhaar No</label>
                                        <input required onkeyup="duplicateaadhar(0)" id="aadhaar_no" type="text"
                                            name="aadhaar_no" class="form-control number" maxlength="12"
                                            placeholder="Aadhaar No">
                                        <span id="dupaadhar" style="color:red"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="field-2" class="form-label">Aadhaar Image</label>
                                        <input required type="file" name="aadhaar_file" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="field-1" class="form-label">Pan No</label>
                                        <input required onkeyup="duplicatepan(0)" id="pan_no" type="text"
                                            name="pan_no" class="form-control" maxlength="10"
                                            placeholder="Pan No">
                                        <span id="duppan" style="color:red"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="field-2" class="form-label">Pan Image</label>
                                        <input required type="file" name="pan_file" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="field-1" class="form-label">Email</label>
                                        <input required onkeyup="duplicateemail(0)" id="email" type="email"
                                            name="email" class="form-control" maxlength="30"
                                            placeholder="Email">
                                        <span id="dupemail" style="color:red"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="field-2" class="form-label">Password</label>
                                        <input required type="password" maxlength="10" name="password"
                                            class="form-control" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="save" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="card">
        <div class="modal fade" id="retailer" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title align-self-center" id="exampleModalform1">Retailer
                            Registeration</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ url('/saveretailerregister') }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="field-1" class="form-label">Name</label>
                                        <input required type="text" name="name" maxlength="30" class="form-control"
                                            placeholder="Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input required onkeyup="duplicatephone1(0)" id="phone" type="text"
                                            name="phone" class="form-control number" maxlength="10"
                                            placeholder="Phone">
                                        <span id="dupphone1" style="color:red"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="field-1" class="form-label">Aadhaar No</label>
                                        <input required onkeyup="duplicateaadhar1(0)" id="aadhaar_no" type="text"
                                            name="aadhaar_no" class="form-control number" maxlength="12"
                                            placeholder="Aadhaar No">
                                        <span id="dupaadhar1" style="color:red"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="field-2" class="form-label">Aadhaar Image</label>
                                        <input required type="file" name="aadhaar_file" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="field-1" class="form-label">Pan No</label>
                                        <input required onkeyup="duplicatepan1(0)" id="pan_no" type="text"
                                            name="pan_no" class="form-control" maxlength="10"
                                            placeholder="Pan No">
                                        <span id="duppan1" style="color:red"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="field-2" class="form-label">Pan Image</label>
                                        <input required type="file" name="pan_file" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="field-1" class="form-label">Email</label>
                                        <input required onkeyup="duplicateemail1(0)" id="email" type="email"
                                            name="email" class="form-control" maxlength="30"
                                            placeholder="Email">
                                        <span id="dupemail1" style="color:red"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="field-2" class="form-label">Password</label>
                                        <input required type="password" maxlength="10" name="password"
                                            class="form-control" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="save1" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card">
        <div class="modal fade" id="customer" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title align-self-center" id="exampleModalform1">Customer
                            Registeration</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ url('/saveregister') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="field-1" class="form-label">Name</label>
                                        <input required type="text" name="name" maxlength="30" class="form-control"
                                            placeholder="Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="field-2" class="form-label">Phone</label>
                                        <input required onkeyup="duplicatephone2(0)" id="phone" type="text"
                                            name="phone" class="form-control number" maxlength="10"
                                            placeholder="Phone">
                                        <span id="dupphone2" style="color:red"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="field-1" class="form-label">Aadhaar No</label>
                                        <input required onkeyup="duplicateaadhar2(0)" id="aadhaar_no" type="text"
                                            name="aadhaar_no" class="form-control number" maxlength="12"
                                            placeholder="Aadhaar No">
                                        <span id="dupaadhar2" style="color:red"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="field-2" class="form-label">Aadhaar Image</label>
                                        <input required type="file" name="aadhaar_file" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="field-1" class="form-label">Email</label>
                                        <input required onkeyup="duplicateemail2(0)" id="email" type="email"
                                            name="email" class="form-control" maxlength="30"
                                            placeholder="Email">
                                        <span id="dupemail2" style="color:red"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="field-2" class="form-label">Password</label>
                                        <input required type="password" maxlength="10" name="password"
                                            class="form-control" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="save2" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/default-assets/setting.js') }}"></script>
    <script src="{{ asset('assets/js/default-assets/scrool-bar.js') }}"></script>
    <script src="{{ asset('assets/js/todo-list.js') }}"></script>


    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bi-eye-slash-fill");
                    $('#show_hide_password i').removeClass("bi-eye-fill");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bi-eye-slash-fill");
                    $('#show_hide_password i').addClass("bi-eye-fill");
                }
            });
        });

//Distributor Script

function duplicateemail(id) {
                var email = $("#email").val().trim();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    type: "post",
                    url: '{{ url('checkemailregister') }}',
                    data: {
                        id: id,
                        email: email,
                        _token: _token
                    },

                    success: function(res) {
                        if (res.exists) {
                            $("#save").prop('disabled', true);
                            $("#dupemail").html("email alredy exists!");
                        } else {
                            $("#save").prop('disabled', false);
                            $("#dupemail").html("");
                        }
                    },

                    error: function(jqXHR, exception) {
                        console.log(exception);
                    }
                });
            }

            function duplicateaadhar(id) {
                var aadhaar_no = $("#aadhaar_no").val().trim();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    type: "post",
                    url: '{{ url('checkaadharregister') }}',
                    data: {
                        id: id,
                        aadhaar_no: aadhaar_no,
                        _token: _token
                    },

                    success: function(res) {
                        if (res.exists) {
                            $("#save").prop('disabled', true);
                            $("#dupaadhar").html("aadhar no alredy exists!");
                        } else {
                            $("#save").prop('disabled', false);
                            $("#dupaadhar").html("");
                        }
                    },
                    error: function(jqXHR, exception) {
                        console.log(exception);
                    }
                });
            }

            function duplicatephone(id) {
                var phone = $("#phone").val().trim();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    type: "post",
                    url: '{{ url('checkphoneregister') }}',
                    data: {
                        id: id,
                        phone: phone,
                        _token: _token
                    },

                    success: function(res) {
                        if (res.exists) {
                            $("#save").prop('disabled', true);
                            $("#dupphone").html("mobile no alredy exists!");
                        } else {
                            $("#save").prop('disabled', false);
                            $("#dupphone").html("");
                        }
                    },

                    error: function(jqXHR, exception) {
                        console.log(exception);
                    }
                });
            }

            function duplicatepan(id) {
                var pan_no = $("#pan_no").val().trim();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    type: "post",
                    url: '{{ url('checkpanregister') }}',
                    data: {
                        id: id,
                        pan_no: pan_no,
                        _token: _token
                    },

                    success: function(res) {
                        if (res.exists) {
                            $("#save").prop('disabled', true);
                            $("#duppan").html("pan no alredy exists!");
                        } else {
                            $("#duppan").html("");
                        }
                        if ($("#dupphone").html() == "" && $("#duppan").html() == "" && $("#duppan").html() ==
                            "") {
                            $("#save").prop('disabled', false);
                        } else {
                            $("#save").prop('disabled', true);
                        }
                    },
                    error: function(jqXHR, exception) {
                        console.log(exception);
                    }

                });
            }

//Retailer Script

function duplicateaadhar1(id) {
            var aadhaar_no = $("#aadhaar_no").val().trim();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                type: "post",
                url: '{{ url('checkaadharregisterretailer') }}',
                data: {
                    id: id,
                    aadhaar_no: aadhaar_no,
                    _token: _token
                },

                success: function(res) {
                    if (res.exists) {
                        $("#save").prop('disabled', true);
                        $("#dupaadhar1").html("aadhar no alredy exists!");
                    } else {
                        $("#dupaadhar1").html("");
                    }
                    if ($("#dupaadhar1").html() == "" && $("#dupaadhar1").html() == "" && $("#dupemail1").html() ==
                        "") {
                        $("#save1").prop('disabled', false);
                    } else {
                        $("#save1").prop('disabled', true);
                    }
                },
                error: function(jqXHR, exception) {
                    console.log(exception);
                }
            });
        }

        function duplicatephone1(id) {
            var phone = $("#phone").val().trim();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                type: "post",
                url: '{{ url('checkphoneregisterretailer') }}',
                data: {
                    id: id,
                    phone: phone,
                    _token: _token
                },

                success: function(res) {
                    if (res.exists) {
                        $("#save").prop('disabled', true);
                        $("#dupphone1").html("mobile no alredy exists!");
                    } else {
                        $("#dupphone1").html("");
                    }
                    if ($("#dupphone1").html() == "" && $("#dupaadhar1").html() == "" && $("#dupemail1").html() ==
                        "") {
                        $("#save1").prop('disabled', false);
                    } else {
                        $("#save1").prop('disabled', true);
                    }
                },

                error: function(jqXHR, exception) {
                    console.log(exception);
                }
            });
        }

        function duplicateemail1(id) {
            var email = $("#email").val().trim();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                type: "post",
                url: '{{ url('checkemailregisterretailer') }}',
                data: {
                    id: id,
                    email: email,
                    _token: _token
                },

                success: function(res) {
                    if (res.exists) {
                        $("#save").prop('disabled', true);
                        $("#dupemail1").html("email no alredy exists!");
                    } else {
                        $("#dupemail1").html("");
                    }
                    if ($("#dupemail1").html() == "" && $("#dupemail1").html() == "" && $("#dupemail1").html() ==
                        "") {
                        $("#save1").prop('disabled', false);
                    } else {
                        $("#save1").prop('disabled', true);
                    }
                },

                error: function(jqXHR, exception) {
                    console.log(exception);
                }
            });
        }

        function duplicatepan1(id) {
            var pan_no = $("#pan_no").val().trim();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                type: "post",
                url: '{{ url('checkpanregisterretailer') }}',
                data: {
                    id: id,
                    pan_no: pan_no,
                    _token: _token
                },

                success: function(res) {
                    if (res.exists) {
                        $("#save").prop('disabled', true);
                        $("#duppan1").html("pan no alredy exists!");
                    } else {
                        $("#duppan1").html("");
                    }
                    if ($("#dupphone1").html() == "" && $("#duppan1").html() == "" && $("#duppan1").html() ==
                        "") {
                        $("#save1").prop('disabled', false);
                    } else {
                        $("#save1").prop('disabled', true);
                    }
                },
                error: function(jqXHR, exception) {
                    console.log(exception);
                }
            });
        }

//Customer Script

function duplicateaadhar2(id) {
            var aadhaar_no = $("#aadhaar_no").val().trim();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                type: "post",
                url: '{{ url('checkaadharregistercustomer') }}',
                data: {
                    id: id,
                    aadhaar_no: aadhaar_no,
                    _token: _token
                },

                success: function(res) {
                    if (res.exists) {
                        $("#save").prop('disabled', true);
                        $("#dupaadhar2").html("aadhar no alredy exists!");
                    } else {
                        $("#dupaadhar2").html("");
                    }
                    if ($("#dupaadhar2").html() == "" && $("#dupaadhar2").html() == "" && $("#dupemail2").html() ==
                        "") {
                        $("#save2").prop('disabled', false);
                    } else {
                        $("#save2").prop('disabled', true);
                    }
                },
                error: function(jqXHR, exception) {
                    console.log(exception);
                }
            });
        }

        function duplicatephone2(id) {
            var phone = $("#phone").val().trim();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                type: "post",
                url: '{{ url('checkphoneregistercustomer') }}',
                data: {
                    id: id,
                    phone: phone,
                    _token: _token
                },

                success: function(res) {
                    if (res.exists) {
                        $("#save").prop('disabled', true);
                        $("#dupphone2").html("mobile no alredy exists!");
                    } else {
                        $("#dupphone2").html("");
                    }
                    if ($("#dupphone2").html() == "" && $("#dupphone2").html() == "" && $("#dupemail2").html() ==
                        "") {
                        $("#save2").prop('disabled', false);
                    } else {
                        $("#save2").prop('disabled', true);
                    }
                },

                error: function(jqXHR, exception) {
                    console.log(exception);
                }
            });
        }

        function duplicateemail2(id) {
            var email = $("#email").val().trim();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                type: "post",
                url: '{{ url('checkemailregistercustomer') }}',
                data: {
                    id: id,
                    email: email,
                    _token: _token
                },

                success: function(res) {
                    if (res.exists) {
                        $("#save").prop('disabled', true);
                        $("#dupemail2").html("email no alredy exists!");
                    } else {
                        $("#dupemail2").html("");
                    }
                    if ($("#dupemail2").html() == "" && $("#dupemail2").html() == "" && $("#dupemail2").html() ==
                        "") {
                        $("#save2").prop('disabled', false);
                    } else {
                        $("#save2").prop('disabled', true);
                    }
                },

                error: function(jqXHR, exception) {
                    console.log(exception);
                }
            });
        }
    </script>

</body>

</html>
