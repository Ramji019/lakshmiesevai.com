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
                            <h5 class="card-title">{{ $servicename }}</h5>

                            <form action="{{ url('/findaadhaar_numberupdate') }}" id="formAccountSettings"
                                method="POST" enctype="multipart/form-data">
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

                                    <div class="mb-3 col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text"
                                            value="{{ $services->name }}" class="form-control" name="name"
                                            maxlength="30" placeholder="Name" />
                                            <label for="smart_link_no" class="form-label">Mobile Number(Smartcard Link)</label>
                                        <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text"
                                            value="{{ $services->smart_link_no }}" class="form-control" name="smart_link_no"
                                            maxlength="15" placeholder="Mobile Number(Smartcard Link)" />
                                    </div>
                                    <div class="mb-3 col-md-6">

                                        <label for="documents" class="form-label">Documents</label>
                                        <select @if (Auth::user()->id != $apply_user_id) disabled @endif class="form-control"
                                            name="documents" id="documents">
                                            <option value="">Select</option>
                                            <option @if ($services->documents == 'Pan Card Number') selected @endif value="Pan Card Number">Pan Card Number
                                            </option>
                                            <option @if ($services->documents == 'Adhaar Enrolment Slip') selected @endif value="Adhaar Enrolment Slip">Adhaar Enrolment Slip
                                            </option>
                                        </select>
                                        <label for="pan_card_no" class="form-label">Pan Card Number</label>
                                        <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text"
                                            value="{{ $services->pan_card_no }}" class="form-control" name="pan_card_no"
                                            maxlength="15" id="pan_card_nohide" placeholder="Pan Card Number" />

                                        <div id="aadhaar_entrolment_sliphide" style="display: none">
                                        @if (Auth::user()->id != $apply_user_id)
                                        @if ($services->aadhaar_entrolment_slip != '')
                                            <label>Adhaar Enrolment Slip</label>
                                            <br><a target="_blank"
                                                href="{{ URL::to('/') }}/upload/services/aadhaar_entrolment_slip/{{ $services->aadhaar_entrolment_slip }}"
                                                class="btn btn-primary me-2">View</a><br>
                                        @endif
                                    @else
                                        <label>Adhaar Enrolment Slip</label>
                                        <input @if ($services->documents == 'Adhaar Enrolment Slip' && $services->aadhaar_entrolment_slip == '') required @endif class="form-control"
                                            type="file" accept="image/jpeg, image/png" name="aadhaar_entrolment_slip">
                                        @if ($services->aadhaar_entrolment_slip != '')
                                            <a target="_blank"
                                                href="{{ URL::to('/') }}/upload/services/aadhaar_entrolment_slip/{{ $services->aadhaar_entrolment_slip }}">Download</a><br>
                                        @endif
                                    @endif
                                    </div>
                                </div>
                                    @if (Auth::user()->id != $apply_user_id)
                                    <div class="mb-3 col-md-6">
                                        <label for="service_name" class="form-label">Service Status</label>
                                        <select class="form-control" name="status" id="service_status">
                                            <option value="">Select</option>
                                            <option @if ($services->status == 'Pending') selected @endif value="Pending">
                                                Pending</option>
                                            <option @if ($services->status == 'Resubmit') selected @endif value="Resubmit">
                                                Resubmit</option>
                                            <option @if ($services->status == 'Processing') selected @endif
                                                value="Processing">Processing</option>
                                            @if ($services->status != 'Approved')
                                                <option @if ($services->status == 'Rejected') selected @endif
                                                    value="Rejected">Rejected</option>
                                            @endif
                                            <option @if ($services->status == 'Approved') selected @endif value="Approved">
                                                Approved</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6" id="remarkshide" style="display :none;">
                                        <label for="remarks" class="form-label">Remarks</label>
                                        <input value="{{ $services->remarks }}" class="form-control" type="text"
                                            name="remarks" maxlength="100" id="remarks" placeholder="Remarks" />
                                    </div>
                                    <div class="mb-3 col-md-6" id="selecthide" style="display :none;">
                                        <label for="select" class="form-label">Select</label>
                                        <select class="form-control" name="selects" id="select">
                                            <option>select</option>
                                            <option @if ($services->selects == 'Text') selected @endif value = "Text">
                                                Text</option>
                                            <option @if ($services->selects == 'File') selected @endif value = "File">
                                                File</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6" id="acknowledgementhide" style="display :none;">
                                        <label for="acknowledgement" class="form-label">Acknowledgement</label>
                                        <input class="form-control" type="file" name="acknowledgement"
                                            id="acknowledgement" />
                                    </div>
                                    <div class="mb-3 col-md-6" id="applicationnohide" style="display :none;">
                                        <label for="application_no" class="form-label">Application No</label>
                                        <input value="{{ $services->application_no }}" class="form-control"
                                            type="text" maxlength="20" name="application_no" id="application_no" />
                                    </div>
                                    <div class="mb-3 col-md-6" id="selectshide" style="display :none;">
                                        <label for="selects" class="form-label">Select</label>
                                        <select class="form-control" name="lects" id="selects">
                                            <option>select</option>
                                            <option @if ($services->lects == 'Text') selected @endif value = "Text">
                                                Text</option>
                                            <option @if ($services->lects == 'File') selected @endif value = "File">
                                                File</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6" id="applicationhide" style="display :none;">
                                        <label for="application" class="form-label">Application</label>
                                        <input value="{{ $services->application }}" class="form-control" type="text"
                                            maxlength="150" name="application" id="application" />
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
            var selects = "{{ $services->selects }}";
            var lects = "{{ $services->lects }}";
            var certificate = "{{ $services->certificate }}";

            if (status == "Resubmit") {
                $('#remarkshide').show("slow");
                $('#remarks').prop("required", true);

            } else if (status == "Processing") {
            if(selects == "Text"){
                $('#applicationnohide').show("slow");
            }
            if(selects == "File"){
                $('#acknowledgementhide').show("slow");
                if (acknowledgement == "") {
                    $('#acknowledgement').prop("required", true);
                }
            }
                $('#selecthide').show("slow");


            } else if (status == "Approved") {
            if(lects == "Text"){
                $('#applicationhide').show("slow");
            }
            if(lects == "File"){
                $('#certhide').show("slow");
                if (certificate == "") {
                    $('#certificate').prop("required", true);
                }
            }
                $('#selectshide').show("slow")
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
                $('#select').prop("required", false);
                $('#selecthide').hide("slow");
                $('#selects').prop("required", false);
                $('#selectshide').hide("slow");
            } else if ($('#service_status').val() == 'Processing') {
                $('#acknowledgementhide').hide("slow");
                $('#acknowledgement').prop("required", false);
                $('#remarkshide').hide("slow");
                $('#remarks').prop("required", false);
                $('#certhide').hide("slow");
                $('#certificate').prop("required", false);
                $('#applicationnohide').hide("slow");
                $('#application_no').prop("required", false);
                $('#select').prop("required", true);
                $('#selecthide').show("slow");
                $('#selects').prop("required", false);
                $('#selectshide').hide("slow");
            } else if ($('#service_status').val() == 'Approved') {
                $('#remarkshide').hide("slow");
                $('#remarks').prop("required", false);
                $('#acknowledgementhide').hide("slow");
                $('#acknowledgement').prop("required", false);
                $('#certhide').hide("slow");
                $('#certificate').prop("required", false);
                $('#applicationnohide').hide("slow");
                $('#application_no').prop("required", false);
                $('#select').prop("required", false);
                $('#selecthide').hide("slow");
                $('#selects').prop("required", true);
                $('#selectshide').show("slow");
            } else {
                $('#remarkshide').hide("slow");
                $('#remarks').prop("required", false);
                $('#acknowledgementhide').hide("slow");
                $('#acknowledgement').prop("required", false);
                $('#certhide').hide("slow");
                $('#certificate').prop("required", false);
                $('#applicationnohide').hide("slow");
                $('#application_no').prop("required", false);
                $('#select').prop("required", false);
                $('#selecthide').hide("slow");
                $('#selects').prop("required", false);
                $('#selectshide').hide("slow");
            }
        });

        $('#select').change(function() {
            if ($('#select').val() == 'Text') {
                $('#applicationnohide').show("slow");
                $('#application_no').prop("required", true);
                $('#acknowledgementhide').hide("slow");
                $('#acknowledgement').prop("required", false);
            } else if ($('#select').val() == 'File') {
                $('#acknowledgementhide').show("slow");
                $('#acknowledgement').prop("required", false);
                $('#applicationnohide').hide("slow");
                $('#application_no').prop("required", false);
            } else {
                $('#applicationnohide').hide("slow");
                $('#application_no').prop("required", false);
                $('#acknowledgementhide').hide("slow");
                $('#acknowledgement').prop("required", false);
            }
        });

        $('#selects').change(function() {
            if ($('#selects').val() == 'Text') {
                $('#applicationhide').show("slow");
                $('#application').prop("required", true);
                $('#certhide').hide("slow");
                $('#certificate').prop("required", false);
            } else if ($('#selects').val() == 'File') {
                $('#certhide').show("slow");
                $('#certificate').prop("required", false);
                $('#applicationhide').hide("slow");
                $('#application').prop("required", false);
            } else {
                $('#applicationhide').hide("slow");
                $('#application').prop("required", false);
                $('#certhide').hide("slow");
                $('#certificate').prop("required", false);
            }
        });

        $('#documents').change(function(){
        if($('#documents').val() == 'Pan Card Number') {
            $('#pan_card_nohide').show("slow");
            $('#pan_card_no').prop("required", true);
            $('#aadhaar_entrolment_sliphide').hide("slow");
            $('#aadhaar_entrolment_slip').prop("required", false);
        } else if($('#documents').val() == 'Adhaar Enrolment Slip') {
            $('#aadhaar_entrolment_sliphide').show("slow");
            $('#aadhaar_entrolment_slip').prop("required", true);
            $('#pan_card_nohide').hide("slow");
            $('#pan_card_no').prop("required", false);
        }else{
            $('#pan_card_nohide').hide("slow");
            $('#pan_card_no').prop("required", false);
            $('#aadhaar_entrolment_slip').prop("required", false);
            $('#aadhaar_entrolment_sliphide').hide("slow");
        }
    });

    </script>
@endpush
