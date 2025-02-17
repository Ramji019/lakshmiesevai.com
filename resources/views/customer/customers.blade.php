@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
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
                    <h5 class="card-title">Customers</h5>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>User Id</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($viewcustomers as $key => $cus)
                                    <tr>
                                        <td>C{{ $cus->id }}</td>
                                        <td>
                                            <a class="d-flex align-items-center gap-3" href="{{ url('profile') }}">
                                                <div class="customer-pic">
                                                    <img src="/upload/users/profile_photo/{{ $cus->profile }}"
                                                        class="rounded-circle" width="30" height="30" alt="">
                                                </div>
                                                <p class="mb-0 customer-name fw-bold">{{ $cus->name }}</p>
                                            </a>
                                        </td>
                                        <td>{{ $cus->phone }}</td>
                                        <td>{{ $cus->email }}</td>
                                        <td>{{ $cus->cpassword }}</td>
                                        <td style="white-space: nowrap">

                                            <a href="{{ url('/editcustomer', $cus->id) }}" style="font-size: small"
                                                class="btn-sm btn btn-primary">Edit</a>

                                            <a href="{{ url('/allservice', $cus->id) }}" style="font-size: small"
                                                class="btn-sm btn btn-warning">TNEGA</a>

                                            <a href="{{ url('/documents', $cus->id) }}" style="font-size: small"
                                                class="btn-sm btn btn-success">Document</a>

                                            @if (Auth::user()->user_type_id == 2 )
                                                <button
                                                    onclick="user_type('{{ $cus->id }}')"
                                                    type="button" class="btn-sm btn btn-primary">UserType</button>
                                            @endif
                                        </td>
                                    </tr>
                                     @endforeach
                            </tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-body">
            <div class="modal fade" id="userty">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title align-self-center" id="exampleModalform1">Update UserType</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mt-1">
                            <div class="form-body">
                                <form class="row g-3" action="{{ url('/updatecustomererusertype') }}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="type_id" id="type_id" />
                                            <div class="mb-3">
                                                <label for="editusertype" class="form-label">Status</label>
                                                <select name="user_type_id" type="text" maxlength="8" class="form-control" id="editusertype" >
                                                    <option value="">Select</option>
                                                    <option value="3">Distributor</option>
                                                    <option value="4">Retailer</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('page_scripts')
    <script>
 function user_type(id, user_type_id ) {
            $("#editusertype").val(user_type_id);
            $("#type_id").val(id);
            $("#userty").modal("show");
 }
    </script>
@endpush
