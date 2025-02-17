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
                            <form class="row g-4" action="{{ url('submitaadhaar') }}" enctype="multipart/form-data"
                                method="post">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="serviceid" value="{{ $serviceid }}">
                                    <input type="hidden" name="amount" value="{{ $amount }}">
                                    <input type="hidden" name="service_amount" value="{{ $payment }}">
                                    <input type="hidden" name="user_id" value="{{ $customers->id }}">

                                    @if ($serviceid == 56)
                                        <div class="mb-3 col-md-6">
                                            <label for="name" class="form-label">Applicant Name</label>
                                            <input required type="text" class="form-control" name="name"
                                                placeholder="Applicant Name" maxlength="30" />

                                            <label for="relationship" class="form-label">Relationship</label>
                                            <select required type="text" class="form-control" name="relationship">
                                                <option value="">Select</option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Husband">Husband</option>
                                                <option value="Gaurdian">Gaurdian</option>
                                            </select>

                                            <label for="name_english" class="form-label">Name In English</label>
                                            <input required type="text" maxlength="30" class="form-control"
                                                name="name_english" placeholder="Name In English" />

                                            <label for="name_tamil" class="form-label">தமிழில் பெயர்</label>
                                            <input required type="text" maxlength="30" class="form-control"
                                                name="name_tamil" placeholder="தமிழில் பெயர்" />

                                            <label for="address_english" class="form-label">Address In English</label>
                                            <textarea required rows="2" type="text" maxlength="200" class="form-control" name="address_english"
                                                placeholder="Address In English"></textarea>

                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="aadhaar_card" class="form-label">Adhaar card (front & Back)</label>
                                            <input required type="file"  class="form-control"
                                                name="aadhaar_card" placeholder="Adhaar card (front & Back)" />
                                                <label for="photo" class="form-label">Photo</label>
                                            <input required type="file" class="form-control"
                                                name="photo" placeholder="Photo" />
                                                <label for="signature" class="form-label">Signature</label>
                                            <input required type="file" class="form-control"
                                                name="signature" placeholder="Signature" />

                                            
                                            <label for="mobile" class="form-label number">Mobile Number</label>
                                            <input required type="text" maxlength="10" class="form-control number"
                                                name="mobile" placeholder="Mobile No" />

                                            <label for="address_tamil" class="form-label">முகவரி தமிழில்</label>
                                            <textarea required rows="2" type="text" maxlength="200" class="form-control" name="address_tamil"
                                                placeholder="முகவரி தமிழில்"></textarea>

                                        </div>
                                    @elseif ($serviceid == 58)
                                        <div class="mb-3 col-md-6">
                                            <label for="name" class="form-label">Applicant Name</label>
                                            <input required type="text" class="form-control" name="name"
                                                placeholder="Applicant Name" maxlength="30" />

                                            <label for="relationship" class="form-label">Relationship</label>
                                            <select required type="text" class="form-control" name="relationship">
                                                <option value="">Select</option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Husband">Husband</option>
                                                <option value="Gaurdian">Gaurdian</option>
                                            </select>

                                            <label for="name_english" class="form-label">Name In English</label>
                                            <input required type="text" maxlength="30" class="form-control"
                                                name="name_english" placeholder="Name In English" />

                                            <label for="name_tamil" class="form-label">தமிழில் பெயர்</label>
                                            <input required type="text" maxlength="30" class="form-control"
                                                name="name_tamil" placeholder="தமிழில் பெயர்" />

                                            <label for="address_proof" class="form-label">Address Proof</label>
                                            <select required type="text" class="form-control" name="address_proof">
                                                <option value="">Select</option>
                                                <option value="Voter id">Voter id</option>
                                                <option value="Passport">Passport</option>
                                                <option value="Electricity Bill">Electricity Bill</option>
                                                <option value="Gas Bill">Gas Bill</option>
                                            </select>

                                            <label for="address_english" class="form-label">Address In English</label>
                                            <textarea required rows="2" type="text" maxlength="200" class="form-control" name="address_english"
                                                placeholder="Address In English"></textarea>

                                        </div>
                                        <div class="mb-3 col-md-6">

                                            <label for="aadhaar_card" class="form-label">Adhaar card (front & Back)</label>
                                            <input required type="file"  class="form-control"
                                                name="aadhaar_card" placeholder="Adhaar card (front & Back)" />
                                                <label for="photo" class="form-label">Photo</label>
                                            <input required type="file" class="form-control"
                                                name="photo" placeholder="Photo" />
                                                <label for="signature" class="form-label">Signature</label>
                                            <input required type="file" class="form-control"
                                                name="signature" placeholder="Signature" />

                                            <label for="mobile" class="form-label number">Mobile Number</label>
                                            <input required type="text" maxlength="10" class="form-control number"
                                                name="mobile" placeholder="Mobile No" />

                                            <label for="proof" class="form-label">Proof</label>
                                            <input required type="file" maxlength="20" class="form-control"
                                                name="proof" />

                                            <label for="address_tamil" class="form-label">முகவரி தமிழில்</label>
                                            <textarea required rows="2" type="text" maxlength="200" class="form-control" name="address_tamil"
                                                placeholder="முகவரி தமிழில்"></textarea>

                                        </div>
                                    @elseif ($serviceid == 158)
                                        <div class="mb-3 col-md-6">
                                            <label for="photo" class="form-label">Enrollment slip</label>
                                            <input required accept="image/jpeg, image/png,application/pdf" type="file"
                                                class="form-control" name="enrollment_slip" />

                                                <label for="aadhaar_card" class="form-label">Adhaar card (front & Back)</label>
                                                <input required type="file"  class="form-control"
                                                    name="aadhaar_card" placeholder="Adhaar card (front & Back)" />
                                               
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="signature" class="form-label">Correction proof</label>
                                            <input required accept="image/jpeg, image/png,application/pdf" type="file"
                                                class="form-control" name="correction_proof" />
                                        </div>
                                    @elseif ($serviceid == 159)
                                        <div class="mb-3 col-md-6">
                                            <label for="photo" class="form-label">Enrollment slip</label>
                                            <input required accept="image/jpeg, image/png,application/pdf" type="file"
                                                class="form-control" name="enrollment_slip" />

                                                <label for="aadhaar_card" class="form-label">Adhaar card (front & Back)</label>
                                                <input required type="file"  class="form-control"
                                                    name="aadhaar_card" placeholder="Adhaar card (front & Back)" />
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="signature" class="form-label">Correction proof</label>
                                            <input required accept="image/jpeg, image/png,application/pdf" type="file"
                                                class="form-control" name="correction_proof" />
                                        </div>
                                    @elseif ($serviceid == 160)
                                    <div class="mb-3 col-md-6">
                                        <label for="enrollment_type" class="form-label">Enrollment Type</label>
                                        <select required  type="text" id="enrollment_type"
                                            class="form-control" name="enrollment_type">
                                            <option value="">Select</option>
                                            <option value="Enrollment Slip">Enrollment Slip</option>
                                            <option value="Enrollment Number">Enrollment Number</option>
                                        </select>

                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="" id="ensliphide" style="display: none;">
                                        <label for="enrollment_slip" class="form-label">Enrollment Slip</label>
                                        <input required accept="image/jpeg, image/png,application/pdf" type="file" id="enslip"
                                            class="form-control" name="enrollment_slip" />
                                       </div>
                                        <div class="" id="ennumberhide" style="display: none;">
                                        <label for="enrollment_no" class="form-label">Enrollment Number</label>
                                        <input required id="ennumber" type="text" maxlength="20" class="form-control number" name="enrollment_no" placeholder="Enrollment Number" />
                                       </div>
                                    </div>
                                    @elseif ($serviceid == 161)
                                    <div class="mb-3 col-md-6">
                                        <label for="enrollment_type" class="form-label">Enrollment Type</label>
                                        <select required  type="text" id="enrollment_type"
                                            class="form-control" name="enrollment_type">
                                            <option value="">Select</option>
                                            <option value="Enrollment Slip">Enrollment Slip</option>
                                            <option value="Enrollment Number">Enrollment Number</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="" id="ensliphide" style="display: none;">
                                        <label for="enrollment_slip" class="form-label">Enrollment Slip</label>
                                        <input required accept="image/jpeg, image/png,application/pdf" type="file" id="enslip"
                                            class="form-control" name="enrollment_slip" />
                                       </div>
                                        <div class="" id="ennumberhide" style="display: none;">
                                        <label for="enrollment_no" class="form-label">Enrollment Number</label>
                                        <input required id="ennumber" type="text" maxlength="20" class="form-control number" name="enrollment_no" placeholder="Enrollment Number" />
                                       </div>
                                    </div>
                                    @elseif ($serviceid == 162)
                                    <div class="mb-3 col-md-6">
                                        <label for="name" class="form-label">Name as Per Adhaar</label>
                                        <input required type="text" maxlength="30"
                                            class="form-control" name="name" placeholder="Name as Per Adhaar"/>

                                        <label for="mobile" class="form-label">Cell Number</label>
                                        <input required type="text" maxlength="10" class="form-control number" name="mobile" placeholder="Cell Number"/>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="aadhaar_no" class="form-label">Aadhaar Number</label>
                                        <input required type="text" class="form-control number" name="aadhaar_no" maxlength="12" placeholder="Aadhaar Number" />
                                    </div>
                                    @elseif ($serviceid == 163)
                                    <div class="mb-3 col-md-6">
                                        <label for="aadhaar_no" class="form-label">Aadhaar Number</label>
                                        <input required type="text" class="form-control number" name="aadhaar_no" maxlength="12" placeholder="Aadhaar Number" />

                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input required type="text" maxlength="30"
                                            class="form-control" name="name" placeholder="Name"/>
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


        $('#enrollment_type').change(function(){
        if($('#enrollment_type').val() == 'Enrollment Slip') {
             $('#ensliphide').show("slow");
             $('#ennumberhide').hide("slow");
             $('#enslip').prop("required",true);
             $('#ennumber').prop("required",false);
        } else if($('#enrollment_type').val() == 'Enrollment Number') {
            $('#ennumberhide').show("slow");
            $('#ensliphide').hide("slow");
            $('#enslip').prop("required",false);
            $('#ennumber').prop("required",true);
        }
    });
    </script>
@endpush
