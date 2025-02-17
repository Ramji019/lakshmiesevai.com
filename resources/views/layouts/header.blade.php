<div class="modal fade" id="requestamount" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center" id="exampleModalLongTitle-1">Wallet Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="form-body">
                <form method="post" class="row g-3" action="{{ url('/saverequest') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="text-center">
                            <img src="/upload/qr/qrimg.jpeg" class="img-fluid" alt="...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Amount</label>
                                <input required name="amount" type="text" maxlength="5" class="form-control number"
                                    placeholder="Amount">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Paid Image (Screen)</label>
                                <input required type="file" name="req_image" class="form-control" maxlength="10">
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-3">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="Submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addmoney" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center" id="exampleModalLongTitle-1">Add Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" class="row g-3" action="{{ url('/adminaddwallet') }}"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input required name="wallet" maxlength="5" type="text" class="form-control number"
                        placeholder="Amount">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ramjirequest" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center" id="exampleModalLongTitle-1">Ramji Wallet Request
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="form-body">
                <form method="post" class="row g-3" action="{{ url('/ramjisaverequest') }}"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="text-center">
                            <img src="/upload/qr/qrimgramji.jpeg" class="img-fluid" alt="...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Amount</label>
                                <input required name="amount" type="text" maxlength="5"
                                    class="form-control number" placeholder="Amount">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Paid Image (Screen)</label>
                                <input required type="file" name="req_image" class="form-control" maxlength="10">
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-3">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="Submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="addramji" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center" id="exampleModalLongTitle-1">Add Super Admin
                    Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" class="row g-3" action="{{ url('/superadminaddwallet') }}"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input required name="rawallet" maxlength="5" type="text" class="form-control number"
                        placeholder="Amount">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<header class="top-header-area d-flex align-items-center justify-content-between">

    <div class="left-side-content-area d-flex align-items-center">
        <!-- Mobile Logo -->
        <div class="mobile-logo">
            <a href="{{ url('/dashboard') }}"><img src="{{ asset('assets/img/core-img/small-logo.png') }}"
                    alt="Mobile Logo" /></a>
        </div>

        <!-- Triggers -->
        <div class="flapt-triggers">
            <div class="menu-collasped" id="menuCollasped">
                <i class="bx bx-grid-alt"></i>
            </div>
            <div class="mobile-menu-open" id="mobileMenuOpen">
                <i class="bx bx-grid-alt"></i>
            </div>
        </div>
    </div>

    <div class="right-side-navbar d-flex align-items-center justify-content-end">
        <!-- Mobile Trigger -->
        <div class="right-side-trigger" id="rightSideTrigger">
            <i class="bx bx-menu-alt-right"></i>
        </div>

        <ul class="right-side-content d-flex align-items-center">
            @if (Auth::user()->user_type_id == 4 || Auth::user()->user_type_id == 5 || Auth::user()->user_type_id == 3)
                <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                    <span class="text-danger"><b>Wallet: {{ Auth::user()->wallet }}</b></span>&nbsp;
                    <button type="button" class="btn-sm btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#requestamount">Add Money</button>
                </div>
            @elseif (Auth::user()->user_type_id == 2)
                <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                    <span class="text-danger"><b>Ramji Wallet : {{ Auth::user()->rawallet }}</b></span>&nbsp;
                    <button type="button" class="btn-sm btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#ramjirequest">Add Money</button>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                    <span class="text-danger"><b>Wallet : {{ Auth::user()->wallet }}</b></span>&nbsp;
                    <button type="button" class="btn-sm btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#addmoney">Add Payment</button>
                </div>
            @endif
            @if (Auth::user()->user_type_id == 1)
                <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                    <span class="text-danger"><b>Ramji Wallet : {{ Auth::user()->rawallet }}</b></span>&nbsp;
                    <button type="button" class="btn-sm btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#addramji">Add Payment</button>
                </div>
            @endif
            <li class="nav-item dropdown">
                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img src="{!! asset('upload/profile_photo') !!}/{{ Auth::user()->profile }}" alt="" />
                </button>
                <div class="dropdown-menu profile dropdown-menu-right">
                    <!-- User Profile Area -->
                    <div class="user-profile-area">
                        <a href="#" class="dropdown-item"><i class="bx bx-user font-15"
                                aria-hidden="true"></i> My
                            profile</a>
                        <a href="{{ route('signout') }}" class="dropdown-item"><i class="bx bx-power-off font-15"
                                aria-hidden="true"></i>
                            Sign-out</a>
                    </div>
                </div>
            </li>
        </ul>
</header>
