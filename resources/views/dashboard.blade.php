@extends('layouts.app')
@section('content')
    <div class="main-content introduction-farm">
        <div class="content-wraper-area">
            <div class="dashboard-area">
                <div class="container-fluid">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="dashboard-header-title">
                                    <h5 class="mb-0">Congratulations</h5>
                                </div>

                                <div class="dashboard-infor-mation">
                                    <div class="dashboard-btn-group d-flex align-items-center">
                                        <a href="#" class="dash-btn ms-2"><i class="ti-settings"></i></a>
                                        <a href="#" class="dash-btn ms-2"><i class="ti-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3 col-xxl-3">
                            <div class="card bg-danger">
                                <div class="card-body" data-intro="New Orders">
                                    <div class="single-widget d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="widget-icon">
                                                <a href="{{ url('/appliedservice') }}/Pending"><i class="bx bx-mouse-alt"></i></a>
                                            </div>
                                            <div class="widget-desc">
                                                <h5 class="">Pending</h5>
                                            </div>
                                        </div>
                                        <div class="progress-report" data-title="progress"
                                            data-intro="And this is the last step!">
                                            <h4>{{ $pending }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3 col-xxl-3">
                            <div class="card bg-warning">
                                <div class="card-body" data-intro="New Customers">
                                    <div class="single-widget d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="widget-icon">
                                                <a href="{{ url('/appliedservice') }}/Processing"><i class="bx bx-user-voice"></i></a>
                                            </div>
                                            <div class="widget-desc">
                                                <h5>Inprocess</h5>
                                            </div>
                                        </div>
                                        <div class="progress-report" data-title="progress">
                                            <h4>{{ $inpro }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3 col-xxl-3">
                            <div class="card bg-primary">
                                <div class="card-body" data-intro="Revenue">
                                    <div class="single-widget d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="widget-icon">
                                                <a href="{{ url('/appliedservice') }}/Resubmit"><i class="bx bx-wallet"></i></a>
                                            </div>
                                            <div class="widget-desc">
                                                <h5>Resubmit</h5>
                                            </div>
                                        </div>
                                        <div class="progress-report" data-title="progress"
                                            data-intro="And this is the last step!">
                                            <h4>{{ $resub }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3 col-xxl-3">
                            <div class="card bg-secondary">
                                <div class="card-body" data-intro="Revenue">
                                    <div class="single-widget d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="widget-icon">
                                                <a href="{{ url('/appliedservice') }}/Rejected"><i class="bx bx-wallet"></i></a>
                                            </div>
                                            <div class="widget-desc">
                                                <h5>Rejected</h5>
                                            </div>
                                        </div>
                                        <div class="progress-report" data-title="progress"
                                            data-intro="And this is the last step!">
                                            <h4>{{ $rerej }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3 col-xxl-3">
                            <div class="card bg-success">
                                <div class="card-body" data-intro="Growth">
                                    <div class="single-widget d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="widget-icon">
                                                <a href="{{ url('/appliedservice') }}/Approved"><i class="bx bx-bar-chart-alt-2"></i></a>
                                            </div>
                                            <div class="widget-desc">
                                                <h5>Approved</h5>
                                            </div>
                                        </div>
                                        <div class="progress-report" data-title="progress"
                                            data-intro="And this is the last step!">
                                            <h4>{{ $approve }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 col-xxl-3">
                            <div class="card bg-purple">
                                <div class="card-body" data-intro="New Orders">
                                    <div class="single-widget d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="widget-icon">
                                                <a href="{{ url('/distributors') }}"><i class="bx bx-mouse-alt"></i></a>
                                            </div>
                                            <div class="widget-desc">
                                                <h5 class="">Distributor</h5>
                                            </div>
                                        </div>
                                        <div class="progress-report" data-title="progress"
                                            data-intro="And this is the last step!">
                                            <h4>{{ $distributor }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3 col-xxl-3">
                            <div class="card bg-info">
                                <div class="card-body" data-intro="New Customers">
                                    <div class="single-widget d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="widget-icon">
                                                <a href="{{ url('/retailers') }}"><i class="bx bx-user-voice"></i></a>
                                            </div>
                                            <div class="widget-desc">
                                                <h5>Retailler</h5>
                                            </div>
                                        </div>
                                        <div class="progress-report" data-title="progress">
                                            <h4>{{ $retailer }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3 col-xxl-3">
                            <div class="card bg-warning">
                                <div class="card-body" data-intro="Revenue">
                                    <div class="single-widget d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="widget-icon">
                                                <a href="{{ url('/customers') }}"><i class="bx bx-wallet"></i></a>
                                            </div>
                                            <div class="widget-desc">
                                                <h5>Customers</h5>
                                            </div>
                                        </div>
                                        <div class="progress-report" data-title="progress"
                                            data-intro="And this is the last step!">
                                            <h4>{{ $customercount }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3 col-xxl-3">
                            <div class="card bg-primary">
                                <div class="card-body" data-intro="Growth">
                                    <div class="single-widget d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="widget-icon">
                                                <a href="{{ url('/pdfservices') }}"><i class="bx bx-bar-chart-alt-2"></i></a>
                                            </div>
                                            <div class="widget-desc">
                                                <h5>PDF SERVICES</h5>
                                            </div>
                                        </div>
                                        <div class="progress-report" data-title="progress"
                                            data-intro="And this is the last step!">
                                            <h4>{{ $pdfcount }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 col-xxl-3">
                            <div class="card bg-primary">
                                <div class="card-body" data-intro="New Orders">
                                    <div class="single-widget d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="widget-icon">
                                                <a href="{{ url('/panservices') }}"><i class="bx bx-mouse-alt"></i></a>
                                            </div>
                                            <div class="widget-desc">
                                                <h5 class="">PAN SERVICES</h5>
                                            </div>
                                        </div>
                                        <div class="progress-report" data-title="progress"
                                            data-intro="And this is the last step!">
                                            <h4>{{ $pancount }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3 col-xxl-3">
                            <div class="card bg-warning">
                                <div class="card-body" data-intro="New Customers">
                                    <div class="single-widget d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="widget-icon">
                                                <a href="{{ url('/courses') }}"><i class="bx bx-user-voice"></i></a>
                                            </div>
                                            <div class="widget-desc">
                                                <h5>Course</h5>
                                            </div>
                                        </div>
                                        <div class="progress-report" data-title="progress">
                                            <h4>{{ $coursecount }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3 col-xxl-3">
                            <div class="card bg-primary">
                                <div class="card-body" data-intro="Revenue">
                                    <div class="single-widget d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="widget-icon">
                                                <a href="{{ url('/customers') }}"><i class="bx bx-wallet"></i></a>
                                            </div>
                                            <div class="widget-desc">
                                                <h5>TNEGA</h5>
                                            </div>
                                        </div>
                                        <div class="progress-report" data-title="progress"
                                            data-intro="And this is the last step!">
                                            <h4></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3 col-xxl-3">
                            <div class="card bg-warning">
                                <div class="card-body" data-intro="Growth">
                                    <div class="single-widget d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="widget-icon">
                                                <a href="{{ url('/allservices') }}"><i class="bx bx-bar-chart-alt-2"></i></a>
                                            </div>
                                            <div class="widget-desc">
                                                <h5>CAN SERVICE</h5>
                                            </div>
                                        </div>
                                        <div class="progress-report" data-title="progress"
                                            data-intro="And this is the last step!">
                                            <h4></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 col-xxl-3">
                            <div class="card bg-success">
                                <div class="card-body" data-intro="New Orders">
                                    <div class="single-widget d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="widget-icon">
                                                <a href="{{ url('/rawallet') }}"><i class="bx bx-mouse-alt"></i></a>
                                            </div>
                                            <div class="widget-desc">
                                                <h5 class="">Ramji Wallet</h5>
                                            </div>
                                        </div>
                                        <div class="progress-report" data-title="progress"
                                            data-intro="And this is the last step!">
                                            <h4>{{ Auth::user()->rawallet }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3 col-xxl-3">
                            <div class="card bg-info">
                                <div class="card-body" data-intro="New Customers">
                                    <div class="single-widget d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="widget-icon">
                                                <a href="{{ url('/rapaymentrequest') }}"><i class="bx bx-user-voice"></i></a>
                                            </div>
                                            <div class="widget-desc">
                                                <h5>Ramji Wallet Request</h5>
                                            </div>
                                        </div>
                                        <div class="progress-report" data-title="progress">
                                            <h4>{{ $ramjirequestAmount }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3 col-xxl-3">
                            <div class="card bg-warning">
                                <div class="card-body" data-intro="Revenue">
                                    <div class="single-widget d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="widget-icon">
                                                <a href="{{ url('/paymentrequest') }}"><i class="bx bx-wallet"></i></a>
                                            </div>
                                            <div class="widget-desc">
                                                <h5>Wallet Request</h5>
                                            </div>
                                        </div>
                                        <div class="progress-report" data-title="progress"
                                            data-intro="And this is the last step!">
                                            <h4>{{ $RequestAmount }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3 col-xxl-3">
                            <div class="card bg-success">
                                <div class="card-body" data-intro="Growth">
                                    <div class="single-widget d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="widget-icon">
                                                <a href="{{ url('/wallet') }}"><i class="bx bx-bar-chart-alt-2"></i></a>
                                            </div>
                                            <div class="widget-desc">
                                                <h5>Wallet</h5>
                                            </div>
                                        </div>
                                        <div class="progress-report" data-title="progress"
                                            data-intro="And this is the last step!">
                                            <h4>{{ Auth::user()->wallet }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('page_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var status = $("#statuscheck").val();
            if (status == "Inactive") {
                $('#myModal').modal("show")({
                    backdrop: 'static',
                    keyboard: false
                });
            } else if (status == "Active") {
                $('#paidstatuscheck').modal("hide")({});
            }
        });
    </script>
@endpush
