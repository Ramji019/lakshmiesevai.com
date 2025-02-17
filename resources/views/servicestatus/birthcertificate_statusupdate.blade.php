@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="container-lg flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light"></span>{{ $servicename }}</h4>
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <strong> {{ session('success') }} </strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                        </div>
                        @endif
                        @if (session()->has('error'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <strong> {{ session('error') }} </strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                        </div>
                        @endif
                        <form action="{{ url('/birthcertificate_update') }}" id="formAccountSettings" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <input type="hidden" name="applied_serviceid" value="{{ $services->id }}">
                            <input type="hidden" name="user_id" value="{{ $services->user_id }}">
                            <input type="hidden" name="retailer_id" value="{{ $services->retailer_id }}">
                            <input type="hidden" name="distributor_id" value="{{ $services->distributor_id }}">
                            <input type="hidden" name="serviceid" value="{{ $services->service_id }}">
                            @php
                             $apply_user_id = 0;
                                        if ($services->distributor_id == 0 && $services->retailer_id == 0) {
                                            $apply_user_id = $services->user_id;
                                        }
                                        elseif ($services->retailer_id == 0) {
                                            $apply_user_id = $services->distributor_id;
                                        } elseif ($services->distributor_id == 0) {
                                            $apply_user_id = $services->retailer_id;
                                        }
                            @endphp
                            
                            @if($serviceid == 155)

                            <div class="mb-3 col-md-6">
                                <label for="childname" class="form-label">Child Name</label>
                                <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="text" value="{{ $services->childname }}"  class="form-control"
                                name="childname" maxlength="30" placeholder="Child Name"/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="date_of_birth" class="form-label">Date of birth</label>
                                <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="date" maxlength="10" class="form-control" value="{{ $services->date_of_birth }}"
                                name="date_of_birth" placeholder="Date of birth"/>
                                
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="dist_id" class="form-label">District</label>
                                <select disabled name="dist_id" id="dist_id" class="form-control">
                                    <option value="">Select District</option>
                                    @foreach($districts as $d)
                                    <option value="{{ $d->id }}">{{ $d->district_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3 col-md-6">

                                <label for="mobile" class="form-label number">Mobile Number</label>
                                <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="text" maxlength="10" class="form-control" value="{{ $services->mobile }}"
                                name="mobile" placeholder="Mobile Number"/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="place_of_birth" class="form-label">Place of birth</label>
                                <select @if (Auth::user()->id != $apply_user_id ) disabled @endif class="form-control"
                                    name="place_of_birth">
                                    <option value="">Select Place of birth</option>
                                    <option @if ($services->place_of_birth == 'Hospital') selected @endif value="Hospital">Hospital</option>
                                    <option @if ($services->place_of_birth == 'Home/others') selected @endif value="Home/others">Home/others</option>
                                </select>
                            </div>
                            <div class="" id="hospitalhide" class="form-control" style="display: none;">
                                <label>Hospital</label>
                                <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="text" maxlength="100" class="form-control" value="{{ $services->hospital_name }}"
                                name="hospital_name" id="hospital_name" placeholder="Hospital Name"/>
                            </div>
                            @elseif($serviceid == 156)
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="text" value="{{ $services->name }}"  class="form-control"
                                name="name" maxlength="30" placeholder="Name"/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="date_of_death" class="form-label">Date of Death</label>
                                <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="date" maxlength="10" class="form-control" value="{{ $services->date_of_death }}"
                                name="date_of_death" placeholder="Date of Death"/>
                                
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="dist_id" class="form-label">District</label>
                                <select disabled name="dist_id" id="dist_id" class="form-control">
                                    <option value="">Select District</option>
                                    @foreach($districts as $d)
                                    <option value="{{ $d->id }}">{{ $d->district_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3 col-md-6">
                                
                                <label for="mobile" class="form-label number">Mobile Number</label>
                                <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="text" maxlength="10" class="form-control" value="{{ $services->mobile }}"
                                name="mobile" placeholder="Mobile Number"/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="place_of_death" class="form-label">Place of Death</label>
                                <select @if (Auth::user()->id != $apply_user_id ) disabled @endif class="form-control"
                                    name="place_of_death">
                                    <option value="">Select Place of Death</option>
                                    <option @if ($services->place_of_death == 'Hospital') selected @endif value="Hospital">Hospital</option>
                                    <option @if ($services->place_of_death == 'Home/others') selected @endif value="Home/others">Home/others</option>
                                </select>
                            </div>
                            <div class="" id="hospital" class="form-control" style="display: none;">
                                <label>Hospital</label>
                                <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="text" maxlength="100" class="form-control" value="{{ $services->hospital_name }}"
                                name="hospital_name" id="hospital_name" placeholder="Hospital Name"/>
                            </div>


                        </div>   
                        @endif
                        

                        @if (Auth::user()->id != $apply_user_id )
                        <div class="mb-3 col-md-6">
                            <label for="service_name" class="form-label">Service Status</label>
                            <select class="form-control" name="status" id="service_status">
                                <option value="">Select</option>
                                <option @if ($services->status == 'Pending') selected @endif
                                    value="Pending">Pending</option>
                                    <option @if ($services->status == 'Resubmit') selected @endif
                                        value="Resubmit">Resubmit</option>
                                        <option @if ($services->status == 'Processing') selected @endif
                                            value="Processing">Processing</option>
                                            <option @if ($services->status == 'Approved') selected @endif
                                                value="Approved">Approved</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6" id="remarkshide" style="display :none;">
                                            <label for="remarks" class="form-label">Remarks</label>
                                            <input value="{{ $services->remarks }}" class="form-control" type="text"
                                            name="remarks" maxlength="100" id="remarks" placeholder="Remarks" />
                                        </div>
                                        <div class="mb-3 col-md-6" id="acknowledgementhide" style="display :none;">
                                            <label for="acknowledgement" class="form-label">Acknowledgement</label>
                                            <input class="form-control" type="file" name="acknowledgement"
                                            id="acknowledgement" />
                                        </div>
                                        <div class="mb-3 col-md-6" id="applicationnohide" style="display :none;">
                                            <label for="application_no" class="form-label">Application No</label>
                                            <input value="{{ $services->application_no }}" class="form-control"
                                            type="text" maxlength="20" name="application_no"
                                            id="application_no" />
                                        </div>
                                        <div class="mb-3 col-md-6" id="certhide" style="display :none;">
                                            <label for="certificate" class="form-label">Certificate</label>
                                            <input class="form-control" type="file" name="certificate"
                                            id="certificate" />
                                        </div>
                                        @else
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="service_name" class="form-label">Service Status</label>
                                                <input disabled value="{{ $services->status }}" class="form-control"
                                                type="text" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="remarks" class="form-label">Remarks</label>
                                                <textarea rows="2" class="form-control" type="text" disabled placeholder="Remarks">{{ $services->remarks }}</textarea>
                                            </div>

                                        </div>
                                        @endif

                                    </div>




                                    <div class="mt-2 text-center">
                                        @if ($services->status == 'Resubmit' && ($apply_user_id != Auth::user()->id))
                                        <button type="submit" disabled class="btn btn-primary me-2">Resubmit</button>
                                        @elseif($services->status == 'Approved')
                                        <button type="button" disabled class="btn btn-primary me-2">Completed</button>
                                        @else
                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                        @endif
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-backdrop fade"></div>
            </div>
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        @endsection

        @push('page_scripts')
        <script>
            $(function() {
                
                var status = "{{ $services->status }}";
                var acknowledgement = "{{ $services->acknowledgement }}";
                var certificate = "{{ $services->certificate }}";
                var placeofbirth = "{{ $services->place_of_birth }}";
                var placeofdeath = "{{ $services->place_of_death }}";
                if(placeofbirth == "Hospital"){
                    $('#hospitalhide').show("slow"); 
                }
                if(placeofdeath == "Hospital"){
                    $('#hospital').show("slow"); 
                }
                if (status == "Resubmit") {
                    $('#remarkshide').show("slow");
                    $('#remarks').prop("required", true);
                } else if (status == "Processing") {
                    $('#applicationnohide').show("slow");
                    $('#application_no').prop("required", true);
                    $('#acknowledgementhide').show("slow");
                    if (acknowledgement == "") {
                        $('#acknowledgement').prop("required", true);
                    }
                } else if (status == "Approved") {
                    $('#certhide').show("slow");
                    if (acknowledgement == "") {
                        $('#certificate').prop("required", true);
                    }
                }
            });

            
            $('#service_status').change(function() {
                if ($('#service_status').val() == 'Resubmit') {
                    $('#acknowledgementhide').hide("slow");
                    $('#acknowledgement').prop("required", false);
                    $('#applicationnohide').hide("slow");
                    $('#application_no').prop("required", false);
                    $('#certhide').hide("slow");
                    $('#certificate').prop("required", false);
                    $('#remarkshide').show("slow");
                    $('#remarks').prop("required", true);
                } else if ($('#service_status').val() == 'Processing') {
                    $('#acknowledgementhide').show("slow");
                    $('#acknowledgement').prop("required", true);
                    $('#remarkshide').hide("slow");
                    $('#remarks').prop("required", false);
                    $('#certhide').hide("slow");
                    $('#certificate').prop("required", false);
                    $('#applicationnohide').show("slow");
                    $('#application_no').prop("required", true);
                } else if ($('#service_status').val() == 'Approved') {
                    $('#remarkshide').hide("slow");
                    $('#remarks').prop("required", false);
                    $('#acknowledgementhide').hide("slow");
                    $('#acknowledgement').prop("required", false);
                    $('#certhide').show("slow");
                    $('#certificate').prop("required", true);
                    $('#applicationnohide').hide("slow");
                    $('#application_no').prop("required", false);
                } else {
                    $('#remarkshide').hide("slow");
                    $('#remarks').prop("required", false);
                    $('#acknowledgementhide').hide("slow");
                    $('#acknowledgement').prop("required", false);
                    $('#certhide').hide("slow");
                    $('#certificate').prop("required", false);
                    $('#applicationnohide').hide("slow");
                    $('#application_no').prop("required", false);
                }
            });

            $('#place_of_birth').change(function(){
                if($('#place_of_birth').val() == 'Hospital') {
                    $('#hospitalhide').show("slow"); 
                    $('#hospital_name').prop("required", true);  
                }else{
                    $('#hospitalhide').hide("slow");
                    $('#hospital_name').prop("required", false); 
                } 
            });
            $('#place_of_death').change(function(){
                if($('#place_of_death').val() == 'Hospital') {
                    $('#hospital').show("slow"); 
                    $('#hospital_name').prop("required", true);  
                }else{
                    $('#hospital').hide("slow");
                    $('#hospital_name').prop("required", false); 
                } 
            });

        </script>
        @endpush
