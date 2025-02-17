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
                        <h1 class="card-title">{{ $servicename }}</h1>
                        <h1 class="card-title">Service Payment : <span class="text-danger">{{ $payment }}</span></h1>
                        <div class="row">
                            <form class="row g-4" action="{{ url('submit_fssaiservice') }}" enctype="multipart/form-data"
                                method="post">
                                @csrf
                               <div class="row">
                        <input type="hidden" name="serviceid" value="{{ $serviceid }}">
                        <input type="hidden" name="amount" value="{{ $amount }}">
                        <input type="hidden" name="service_amount" value="{{ $payment }}">
                        <input type="hidden" name="user_id" value="{{ $customers->id }}">
                        @if ($serviceid == 122)

                           <div class="mb-3 col-md-6">
                            <label for="shop_name" class="form-label">Shop Name</label>
                            <input required type="text" class="form-control" maxlength="30"
                            name="shop_name" placeholder="Shop Name"/>
                            <label for="mobile" class="form-label">Mobile Number</label>
                            <input required type="text" class="form-control number" maxlength="10"
                            name="mobile" placeholder="Mobile Number"/>
                            <label for="email_id" class="form-label">Email Id</label>
                            <input required type="text" class="form-control" maxlength="50"
                            name="email_id" placeholder="Email Id"/>
                            <label for="mobile" class="form-label">Applicant Mobile Number</label>
                            <input required type="text" class="form-control number" maxlength="10"
                            name="mobile" placeholder="Applicant Mobile Number"/>
                            
                            
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="photo" class="form-label text-danger">Applicant Photo</label>
                            <input required accept="image/jpeg, image/png"  type="file" class="form-control text-danger"
                            name="photo" />
                            <label for="photo" class="form-label text-danger">Shop Photo</label>
                            <input required accept="image/jpeg, image/png"  type="file" class="form-control text-danger"
                            name="photo" />
                            <label for="aadhaar_card" class="form-label">Adhaar Card (Front & Back)</label>
                            <input required type="file"  class="form-control"
                            name="aadhaar_card" placeholder="Adhaar card (Front & Back)" />
                            <br><a target="_blank" href="/upload/users/aadhaar_file/{{ $customers->aadhaar_file }}" class="btn btn-primary me-2">View</a><br>
                            @endif
                            <label for="pan_card" class="form-label text-danger">Pan Card</label>
                            <input required accept="image/jpeg, image/png"  type="file" class="form-control text-danger"
                            name="pan_card" />
                        </div>
                        @elseif ($serviceid == 123)
                        <div class="mb-3 col-md-6">
                            <label for="shop_name" class="form-label">Shop Name</label>
                            <input required type="text" class="form-control" maxlength="30"
                            name="shop_name" placeholder="Shop Name"/>
                            <label for="mobile" class="form-label">Mobile Number</label>
                            <input required type="text" class="form-control number" maxlength="10"
                            name="mobile" placeholder="Mobile Number"/>
                            <label for="email_id" class="form-label">Email Id</label>
                            <input required type="text" class="form-control" maxlength="50"
                            name="email_id" placeholder="Email Id"/>
                            <label for="mobile" class="form-label">Applicant Mobile Number</label>
                            <input required type="text" class="form-control number" maxlength="10"
                            name="mobile" placeholder="Applicant Mobile Number"/>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="photo" class="form-label text-danger">Applicant Photo</label>
                            <input required accept="image/jpeg, image/png"  type="file" class="form-control text-danger"
                            name="photo" />
                            <label for="photo" class="form-label text-danger">Shop Photo</label>
                            <input required accept="image/jpeg, image/png"  type="file" class="form-control text-danger"
                            name="photo" />
                            <label for="aadhaar_card" class="form-label">Adhaar Card (Front & Back)</label>
                            <input required type="file"  class="form-control"
                            name="aadhaar_card" placeholder="Adhaar card (Front & Back)" />
                            <label for="pan_card" class="form-label text-danger">Pan Card</label>
                            <input required accept="image/jpeg, image/png"  type="file" class="form-control text-danger"
                            name="pan_card" />
                            <label for="old_food_license" class="form-label text-danger">old food license certificate</label>
                            <input required accept="image/jpeg, image/png"  type="file" class="form-control text-danger"
                            name="old_food_license" />
                        </div>
                        @endif    
                         <div class="text-center"><p id="nopayment"></p></div>
                           <div class="text-center">
                                    <div class="col-12">
                                        <div class="mb-0">
                                            <button id="save" type="submit" class="btn btn-primary">Apply</button>
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
@push('page_scripts')
    <script>
 $(function() {
    var wallet = "{{ Auth::user()->wallet }}";
    var amount = "{{ $payment }}";
    if (parseFloat(amount) > parseInt(wallet)) {
        $('#save').prop("disabled", true);
        $('#nopayment').html("No Fund in Wallet.Please Update Your wallet To Continue the Service").css({
                        'color': 'red',
                        'font-size': '150%',
                        'font-weight': 'bold'
                    });
    }
        });

    </script>
@endpush
