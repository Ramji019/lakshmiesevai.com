@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
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
                    <div class="card-body">
                        <h4 class="mb-0">
                            Our Service
                        </h4>
                    </div>
                    <div id="category_div" class="row">
                        <div class="col-4 col-md-2 mb-3 category_data">
                            <div class="card p-2 h-100">
                                <a href="{{ url('addcustomer') }}">
                                    <div class="mb-1">
                                        <img src="/upload/mylogo/tnega.jpg"
                                            width="100%" />
                                    </div>
                                    <div class="text-nowrap overflow-hidden"></br>TNEGA</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-4 col-md-2 mb-3 category_data">
                            <div class="card p-2 h-100">
                                <a href="{{ url('/panservices') }}">
                                    <div class="mb-1">
                                        <img src="/upload/mylogo/nsdl.jpg"
                                            width="100%" />
                                    </div>
                                    <div class="text-nowrap overflow-hidden"></br>NSDL PAN</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-4 col-md-2 mb-3 category_data">
                            <div class="card p-2 h-100">
                                <a href="{{ url('/utislpanservices') }}">
                                    <div class="mb-1">
                                        <img src="/upload/mylogo/utisl.jpg"
                                            width="100%" />
                                    </div>
                                    <div class="text-nowrap overflow-hidden"></br>UTISL</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-4 col-md-2 mb-3 category_data">
                            <div class="card p-2 h-100">
                                <a href="{{ url('/utility') }}">
                                    <div class="mb-1">
                                        <img src="/upload/mylogo/uti.jpg"
                                            width="100%" height="100%" />
                                    </div>
                                    <div class="text-nowrap overflow-hidden"></br>UTILITY</div>
                                </a>
                            </div>
                        </div>
                            <div class="col-4 col-md-2 mb-3 category_data">
                                <div class="card p-2 h-100">
                                    <a href="{{ url('/viewcanservice') }}">
                                        <div class="mb-1">
                                            <img src="/upload/mylogo/can.jpg"
                                                width="100%" />
                                        </div>
                                        <div class="text-nowrap overflow-hidden"></br>CAN</div>
                                    </a>
                                </div>
                            </div>
                        <div class="col-4 col-md-2 mb-3 category_data">
                            <div class="card p-2 h-100">
                                <a href="{{ url('viewpattaservice') }}">
                                    <div class="mb-1">
                                        <img src="/upload/mylogo/patta.jpg"  width="100%"/>
                                    </div>
                                    <div class="text-nowrap overflow-hidden"></br>PATTA</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-4 col-md-2 mb-3 category_data">
                            <div class="card p-2 h-100">
                                <a href="{{ url('pdfservices') }}">
                                    <div class="mb-1">
                                        <img src="/upload/mylogo/pdf.jpg"  width="100%"/>
                                    </div>
                                    <div class="text-nowrap overflow-hidden"></br>PDF</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-4 col-md-2 mb-3 category_data">
                            <div class="card p-2 h-100">
                                <a href="{{ url('viewvoter') }}">
                                    <div class="mb-1">
                                        <img src="/upload/mylogo/voter.jpg"  width="100%"/>
                                    </div>
                                    <div class="text-nowrap overflow-hidden"></br>Voter Id</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-4 col-md-2 mb-3 category_data">
                            <div class="card p-2 h-100">
                                <a href="{{ url('viewsoftware') }}">
                                    <div class="mb-1">
                                        <img src="/upload/mylogo/soft.jpg"  width="100%"/>
                                    </div>
                                    <div class="text-nowrap overflow-hidden"></br>Software Key</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-4 col-md-2 mb-3 category_data">
                            <div class="card p-2 h-100">
                                <a href="{{ url('viewcourseservice') }}">
                                    <div class="mb-1">
                                        <img src="/upload/mylogo/course.jpg"  width="100%"/>
                                    </div>
                                    <div class="text-nowrap overflow-hidden"></br>Course Certificate</div>
                                </a>
                            </div>
                        </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
