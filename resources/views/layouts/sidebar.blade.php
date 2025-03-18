<div class="flapt-sidenav" id="flaptSideNav">
    @if (Auth::user()->user_type_id == 1)
        <div class="side-menu-area">
            <nav>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="treeview active">
                        <a class="menu-active" href="{{ url('/dashboard') }}"><i class=""></i>
                            <span><h5 class="text-danger">{{ Auth::user()->name }}</h5></span>
                            <i class=""></i></a>
                    </li>
                    <li>
                  <a href="{{ url('/dashboard') }}"><i class="bx bx-home-heart"></i><span>Dashboard</span></a>
                </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Service Status</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/appliedservice') }}/Pending">Pending</a></li>
                            <li><a href="{{ url('/appliedservice') }}/Resubmit">Resubmit</a></li>
                            <li><a href="{{ url('/appliedservice') }}/Processing">Processing</a></li>
                            <li><a href="{{ url('/appliedservice') }}/Rejected">Rejected</a></li>
                            <li><a href="{{ url('/appliedservice') }}/Approved">Approved</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>PDF Services</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/addfindservice') }}">Add Find Services</a></li>
                            <li><a href="{{ url('/viewfind') }}">View Find</a></li>
                            <li><a href="{{ url('/findpayment') }}">Payment</a></li>
                            <li><a href="{{ url('/pdfservices') }}">PDF SERVICES</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Utility Services</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/addutilityservice') }}">Add Utility Services</a></li>
                            <li><a href="{{ url('/viewutility') }}">View Utility</a></li>
                            <li><a href="{{ url('/viewoperators') }}">View Operators</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Utility Commission</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            @foreach ($utilityservice as $uti)
                                <li><a href="{{ url('/rechargepayment', $uti->id) }}">{{ $uti->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>PanCard Services</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/addpan') }}">Add Pan</a></li>
                            <li><a href="{{ url('/viewpan') }}">View Pan</a></li>
                            <li><a href="{{ url('/panservicepayment') }}">PanPayment</a></li>
                            <li><a href="{{ url('/panservices') }}">PAN SERVICES</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Course Certificate</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/addcourse') }}">Add Course</a></li>
                            <li><a href="{{ url('/viewcourse') }}">View Course</a></li>
                            <li><a href="{{ url('/coursepayment') }}">CoursePayment</a></li>
                            <li><a href="{{ url('/courses') }}">Apply Certificate</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Services</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/service') }}">Add Service</a></li>
                            <li><a href="{{ url('/viewservice') }}">View Services</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Admin</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admins') }}">View Admins</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Distributor</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/adddistributor') }}">Add Distributor</a></li>
                            <li><a href="{{ url('/distributors') }}">View Distributors</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Retailer</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/addretailer') }}">Add Retailler</a></li>
                            <li><a href="{{ url('/retailers') }}">View Retailer</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>TNEGA</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/addcustomer') }}">Add Customer</a></li>
                            <li><a href="{{ url('/customers') }}">View Customers</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Other Services</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('allservices') }}">Services</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Ramji Wallet</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/rawallet') }}">Ramji Wallet</a></li>
                            <li><a href="{{ url('/rapaymentrequest') }}">Ramji Paymentrequest</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Wallet</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/wallet') }}">Wallet</a></li>
                            <li><a href="{{ url('/paymentrequest') }}">Paymentrequest</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    @endif
    @if (Auth::user()->user_type_id == 2)
        <div class="side-menu-area">
            <nav>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="treeview active">
                        <a class="menu-active" href="javascript:void(0)"><i class=""></i>
                            <span><h5 class="text-danger">{{ Auth::user()->name }}</h5></span>
                            <i class=""></i></a>
                    </li>

                    <li>
                  <a href="{{ url('/dashboard') }}"><i class="bx bx-home-heart"></i><span>Dashboard</span></a>
                </li>

                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Service Status</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/appliedservice') }}/Pending">Pending</a></li>
                            <li><a href="{{ url('/appliedservice') }}/Resubmit">Resubmit</a></li>
                            <li><a href="{{ url('/appliedservice') }}/Processing">Processing</a></li>
                            <li><a href="{{ url('/appliedservice') }}/Rejected">Rejected</a></li>
                            <li><a href="{{ url('/appliedservice') }}/Approved">Approved</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Service Payment</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            @foreach ($services as $service)
                                <li><a
                                        href="{{ url('/servicepayment', $service->id) }}">{{ $service->service_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Smartcard Payment</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            @foreach ($smartservice as $service)
                                <li><a
                                        href="{{ url('/smartcardpayment', $service->id) }}">{{ $service->service_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>PDF Services</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/findpayment') }}">Payment</a></li>
                            <li><a href="{{ url('/pdfservices') }}">PDF SERVICE</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Utility Commission</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            @foreach ($utilityservice as $uti)
                                <li><a href="{{ url('/rechargepayment', $uti->id) }}">{{ $uti->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>UTILITY Services</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/utility') }}">UTILITY</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>PanCard Services</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/panservicepayment') }}">PanPayment</a></li>
                            <li><a href="{{ url('/panservices') }}">PAN SERVICE</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Course Certificate</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/coursepayment') }}">CoursePayment</a></li>
                            <li><a href="{{ url('/courses') }}">Apply Certificate</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Distributor</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/adddistributor') }}">Add Distributor</a></li>
                            <li><a href="{{ url('/distributors') }}">View Distributors</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Retailer</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/addretailer') }}">Add Retailler</a></li>
                            <li><a href="{{ url('/retailers') }}">View Retailer</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>TNEGA</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/addcustomer') }}">Add Customer</a></li>
                            <li><a href="{{ url('/customers') }}">View Customers</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Other Services</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('allservices') }}">Services</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Ramji Wallet</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/rawallet') }}">Ramji Wallet</a></li>
                            <li><a href="{{ url('/rapaymentrequest') }}">Ramji Paymentrequest</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Wallet</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/wallet') }}">Wallet</a></li>
                            <li><a href="{{ url('/paymentrequest') }}">Paymentrequest</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    @endif
    @if (Auth::user()->user_type_id == 3)
        <div class="side-menu-area">
            <nav>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="treeview active">
                        <a class="menu-active" href="javascript:void(0)"><i class=""></i>
                            <span><h5 class="text-danger">{{ Auth::user()->name }}</h5></span>
                            <i class=""></i></a>
                    </li>
                    <li>
                  <a href="{{ url('/dashboard') }}"><i class="bx bx-home-heart"></i><span>Dashboard</span></a>
                </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Service Status</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/appliedservice') }}/Pending">Pending</a></li>
                            <li><a href="{{ url('/appliedservice') }}/Resubmit">Resubmit</a></li>
                            <li><a href="{{ url('/appliedservice') }}/Processing">Processing</a></li>
                            <li><a href="{{ url('/appliedservice') }}/Rejected">Rejected</a></li>
                            <li><a href="{{ url('/appliedservice') }}/Approved">Approved</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>PDF Services</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/pdfservices') }}">PDF SERVICE</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>UTILITY Services</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/utility') }}">UTILITY</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>PanCard Services</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/panservices') }}">PAN SERVICE</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Course Certificate</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/courses') }}">Apply Certificate</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Retailer</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/addretailer') }}">Add Retailler</a></li>
                            <li><a href="{{ url('/retailers') }}">View Retailer</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>TNEGA</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/addcustomer') }}">Add Customer</a></li>
                            <li><a href="{{ url('/customers') }}">View Customers</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Other Services</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('allservices') }}">Services</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Wallet</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/wallet') }}">Wallet</a></li>
                            <li><a href="{{ url('/paymentrequest') }}">Paymentrequest</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    @endif
    @if (Auth::user()->user_type_id == 4)
        <div class="side-menu-area">
            <nav>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="treeview active">
                        <a class="menu-active" href="javascript:void(0)"><i class=""></i>
                            <span><h5 class="text-danger">{{ Auth::user()->name }}</h5></span>
                            <i class=""></i></a>
                    </li>
                    <li>
                  <a href="{{ url('/dashboard') }}"><i class="bx bx-home-heart"></i><span>Dashboard</span></a>
                </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Service Status</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/appliedservice') }}/Pending">Pending</a></li>
                            <li><a href="{{ url('/appliedservice') }}/Resubmit">Resubmit</a></li>
                            <li><a href="{{ url('/appliedservice') }}/Processing">Processing</a></li>
                            <li><a href="{{ url('/appliedservice') }}/Rejected">Rejected</a></li>
                            <li><a href="{{ url('/appliedservice') }}/Approved">Approved</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>PDF Services</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/pdfservices') }}">PDF SERVICE</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>UTILITY Services</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/utility') }}">UTILITY</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>PanCard Services</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/panservices') }}">PAN SERVICE</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Course Certificate</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/courses') }}">Apply Certificate</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>TNEGA</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/addcustomer') }}">Add Customer</a></li>
                            <li><a href="{{ url('/customers') }}">View Customers</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Other Services</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('allservices') }}">Services</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Wallet</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/wallet') }}">Wallet</a></li>
                            <li><a href="{{ url('/paymentrequest') }}">Paymentrequest</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    @endif
    @if (Auth::user()->user_type_id == 5)
        <div class="side-menu-area">
            <nav>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="treeview active">
                        <a class="menu-active" href="javascript:void(0)"><i class=""></i>
                            <span><h5 class="text-danger">{{ Auth::user()->name }}</h5></span>
                            <i class=""></i></a>
                    </li>
                    <li>
                  <a href="{{ url('/dashboard') }}"><i class="bx bx-home-heart"></i><span>Dashboard</span></a>
                </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Service Status</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/appliedservice') }}/Pending">Pending</a></li>
                            <li><a href="{{ url('/appliedservice') }}/Resubmit">Resubmit</a></li>
                            <li><a href="{{ url('/appliedservice') }}/Processing">Processing</a></li>
                            <li><a href="{{ url('/appliedservice') }}/Rejected">Rejected</a></li>
                            <li><a href="{{ url('/appliedservice') }}/Approved">Approved</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>PDF Services</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/pdfservices') }}">PDF SERVICE</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>UTILITY Services</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/utility') }}">UTILITY</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>PanCard Services</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/panservices') }}">PAN SERVICE</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Course Certificate</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/courses') }}">Apply Certificate</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Services</span>
                            <i class="fa fa-angle-right"></i></a>
                        {{-- <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ url('/allservice') }}/{{ Auth::user()->id }}">TNeGA</a></li>
                        </ul> --}}
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ url('allservices') }}">Other Services</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="bx bx-home-heart"></i><span>Wallet</span>
                            <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/wallet') }}">Wallet</a></li>
                            <li><a href="{{ url('/paymentrequest') }}">Paymentrequest</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    @endif
</div>
