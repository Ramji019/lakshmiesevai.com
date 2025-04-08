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
                        <h5 class="card-title">{{ $servicename }}</h5>
                        <h6 class="card-title">Service Payment : <span class="text-danger">{{ $payment }}</span></h6>
                        <div class="row">
                            <form class="row g-4" action="{{ url('submitapply_patta') }}" enctype="multipart/form-data"
                                method="post">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="serviceid" value="{{ $serviceid }}">
                                    <input type="hidden" name="amount" value="{{ $amount }}">
                                    <input type="hidden" name="service_amount" value="{{ $payment }}">
                                    <input type="hidden" name="user_id" value="{{ $customers->id }}">
                                    @if ($serviceid == 213 || $serviceid == 214 || $serviceid == 215)
                                        <div class="mb-3 col-md-6">
                                            <label for="can_no" class="form-label">Can Number</label>
                                            <input required type="text" class="form-control" name="can_no"
                                                placeholder="Can Number" maxlength="15" />

                                            <label for="taluk_id" class="form-label">Taluk</label>
                                            <select required name="taluk_id" id="taluk" class="form-control">
                                            </select>
                                            <label for="reg_office" class="form-label">Register Office</label>
                                            <input required type="text" class="form-control" name="reg_office"
                                                placeholder="Register Office" maxlength="50" />
                                            <label for="subdivision_no" class="form-label">Subdivision No</label>
                                            <input required type="text" class="form-control" name="subdivision_no"
                                                placeholder="Subdivision No" maxlength="30" />
                                            <label for="bond_doc" class="form-label">Bond/பத்திரம் Documents</label>
                                            <input required type="file" class="form-control" name="bond_doc"
                                                placeholder="Bond/பத்திரம் Documents" maxlength="20" />

                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="dist_id" class="form-label">District</label>
                                            <select required name="dist_id" id="dist_id" class="form-control">
                                                <option value="">Select District</option>
                                                @foreach ($districts as $d)
                                                    <option value="{{ $d->id }}">{{ $d->district_name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="rev_village" class="form-label">Revenue Village</label>
                                            <input required type="text" maxlength="50" class="form-control"
                                                name="rev_village" placeholder="Revenue Village" />
                                            <label for="survey_no" class="form-label">Survey No</label>
                                            <input required type="text" maxlength="30" class="form-control"
                                                name="survey_no" placeholder="Survey No" />
                                            <label for="transacted_area" class="form-label">Transacted Area</label>
                                            <input required type="text" maxlength="50" class="form-control"
                                                name="transacted_area" placeholder="Transacted Area" />
                                            <label for="ec" class="form-label">EC</label>
                                            <input required type="file" class="form-control" name="ec"
                                                placeholder="EC" maxlength="20" />

                                        </div>
                                        @elseif($serviceid == 219)
                                        <div class="mb-3 col-md-6">
                                           
                                            <label for="reg_office" class="form-label">பட்டா அல்லது சிட்டா எண்</label>
                                            <input required type="text" class="form-control" name="patta_no"
                                                placeholder="பட்டா அல்லது சிட்டா எண்" maxlength="50" />
                                            <label for="aadhaar_card" class="form-label">ஆதார் கார்டு</label>
                                            <input required type="file" class="form-control" name="aadhaar_card"
                                                placeholder="ஆதார் கார்டு" maxlength="20" />
                                        </div>
                                        <div class="mb-3 col-md-6">
                                           <label for="mobile" class="form-label">கைபேசி எண்(ஆதார் அட்டையில் பதிவு செய்யப்பட்ட கைபேசி எண்)</label>
                                            <input required type="text" class="form-control" name="mobile"
                                                placeholder="கைபேசி எண்" maxlength="30" />
                                        </div>
                                    @endif
                                    <div class="text-center">
                                        <p id="nopayment"></p>
                                    </div>
                                    <div class="text-center">
                                        <div class="col-12">
                                            <div class="mb-0">
                                                <button id="save" type="submit"
                                                    class="btn btn-primary">Apply</button>
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

        $('#dist_id').on('change', function() {
            var dist_id = this.value;
            $("#taluk").html('');
            var url = "{{ url('service/get_taluk') }}/" + dist_id;
            $.ajax({
                url: url,
                type: "GET",
                success: function(result) {
                    $('#taluk').html('<option value="">-- Select Taluk Name --</option>');
                    $.each(result, function(key, value) {
                        $("#taluk").append('<option value="' + value
                            .id + '">' + value.taluk_name + '</option>');
                    });
                    $('#panchayath').html('<option value="">-- Select Panchayath --</option>');
                }
            });
        });

        $('#taluk').on('change', function() {
            var taluk_id = this.value;
            $("#panchayath").html('');
            var url = "{{ url('service/get_panchayath') }}/" + taluk_id;
            $.ajax({
                url: url,
                type: "GET",
                success: function(result) {
                    $('#panchayath').html('<option value="">-- Select Panchayath Name --</option>');
                    $.each(result, function(key, value) {
                        $("#panchayath").append('<option value="' + value
                            .id + '">' + value.panchayath_name + '</option>');
                    });
                }
            });
        });
    </script>
@endpush
