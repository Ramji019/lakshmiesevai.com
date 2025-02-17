@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
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
                        <h5 class="card-title">Add Retailler</h5>
                        <div class="row">
                            <form class="row g-4" action="{{ url('/saveretailer') }}" enctype="multipart/form-data"
                                method="post">
                                {{ csrf_field() }}
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-sm-2 form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input required class="form-control" name="name" maxlength="20" type="text"
                                                id="example-text-input" placeholder="Name">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-search-input" class="col-sm-2 form-label">Aadhaar No</label>
                                        <div class="col-sm-10">
                                            <input required onkeyup="duplicateaadhar(0)" class="form-control" maxlength="12"
                                                type="text" name="aadhaar_no" id="aadhaar_no" placeholder="Aadhaar No">
                                            <span id="dupaadhar" style="color:red"></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-email-input" class="col-sm-2 form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input required onkeyup="duplicateemail(0)" class="form-control" type="email"
                                                maxlength="50" name="email" id="email" placeholder="Email">
                                            <span id="dupemail" style="color:red"></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-url-input" class="col-sm-2 form-label">DOB</label>
                                        <div class="col-sm-10">
                                            <input required class="form-control" type="date" name="date_of_birth"
                                                id="example-url-input">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-url-input" class="col-sm-2 form-label">Address</label>
                                        <div class="col-sm-10">
                                            <textarea required class="form-control" maxlength="100" type="text" rows="3" name="address" id="example-url-input"
                                                placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-month-input" class="col-sm-2 form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input required onkeyup="duplicatephone(0)" class="form-control number" type="text"
                                                name="phone" maxlength="10" id="phone" placeholder="Phone">
                                            <span id="dupphone" style="color:red"></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-2 form-label">Gender</label>
                                        <div class="col-sm-10" name="gender">
                                            <select required class="form-select">
                                                <option>Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input-lg" class="col-sm-2 form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input required  class="form-control" maxlength="10" type="password" name="password"
                                                maxlength="10" placeholder="Password" id="example-text-input-lg">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input-lg" class="col-sm-2 form-label">Profile</label>
                                        <div class="col-sm-10">
                                            <input required class="form-control" maxlength="10" type="file" name="profile"
                                                placeholder="Profile" id="example-text-input-lg">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div class="col-12">
                                        <div class="mb-0">
                                            <button id="save" type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
