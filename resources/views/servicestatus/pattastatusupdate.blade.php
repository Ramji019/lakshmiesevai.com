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

                            <form action="{{ url('/patta_update') }}" id="formAccountSettings" method="POST"
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
                                        } elseif ($services->retailer_id == 0) {
                                            $apply_user_id = $services->distributor_id;
                                        } elseif ($services->distributor_id == 0) {
                                            $apply_user_id = $services->retailer_id;
                                        }
                                    @endphp
                                    @if ($serviceid == 213 || $serviceid == 214 || $serviceid == 215)
                                        <div class="mb-3 col-md-6">
                                            <label for="can_no" class="form-label">Can Number</label>
                                            <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required type="text"
                                                value="{{ $services->can_no }}" class="form-control" name="can_no"
                                                maxlength="15" placeholder="Can Number" />

                                            <label for="taluk_id" class="form-label">Taluk</label>
                                            <select @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif name="taluk_id"
                                                id="taluk" class="form-control">
                                            </select>
                                            <label for="reg_office" class="form-label">Register Office</label>
                                            <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required type="text"
                                                value="{{ $services->reg_office }}" class="form-control" name="reg_office"
                                                maxlength="50" placeholder="Register Office" />
                                            <label for="subdivision_no" class="form-label">Subdivision No</label>
                                            <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required type="text"
                                                value="{{ $services->subdivision_no }}" class="form-control"
                                                name="subdivision_no" maxlength="30" placeholder="Subdivision No" />

                                            @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                                                @if ($services->bond_doc != '')
                                                    <label>Bond/பத்திரம் Documents</label>
                                                    <br><a target="_blank"
                                                        href="{{ URL::to('/') }}/upload/services/bond_doc/{{ $services->bond_doc }}"
                                                        class="btn btn-primary me-2">View</a><br>
                                                @endif
                                            @else
                                                <label>Bond/பத்திரம் Documents</label>
                                                <input @if ($services->bond_doc == '') required @endif
                                                    class="form-control" type="file" name="bond_doc">
                                                @if ($services->bond_doc != '')
                                                    <a target="_blank"
                                                        href="{{ URL::to('/') }}/upload/services/bond_doc/{{ $services->bond_doc }}">Download</a><br>
                                                @endif
                                            @endif

                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="dist_id" class="form-label">District</label>
                                            <select @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif name="dist_id"
                                                id="dist_id" class="form-control">
                                                <option value="">Select District</option>
                                                @foreach ($districts as $d)
                                                    <option @if ($d->id == $services->dist_id) selected @endif
                                                        value="{{ $d->id }}">{{ $d->district_name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="rev_village" class="form-label">Revenue Village</label>
                                            <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required
                                                type="text" maxlength="50" class="form-control"
                                                value="{{ $services->rev_village }}" name="rev_village"
                                                placeholder="Revenue Village" />
                                            <label for="survey_no" class="form-label">Survey No</label>
                                            <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required
                                                type="text" maxlength="30" class="form-control"
                                                value="{{ $services->survey_no }}" name="survey_no"
                                                placeholder="Survey No" />
                                            <label for="transacted_area" class="form-label">Transacted Area</label>
                                            <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required
                                                type="text" maxlength="50" class="form-control"
                                                value="{{ $services->transacted_area }}" name="transacted_area"
                                                placeholder="Transacted Area" />
                                            @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                                                @if ($services->ec != '')
                                                    <label>EC</label>
                                                    <br><a target="_blank"
                                                        href="{{ URL::to('/') }}/upload/services/ec/{{ $services->ec }}"
                                                        class="btn btn-primary me-2">View</a><br>
                                                @endif
                                            @else
                                                <label>EC</label>
                                                <input @if ($services->ec == '') required @endif
                                                    class="form-control" type="file" name="ec">
                                                @if ($services->ec != '')
                                                    <a target="_blank"
                                                        href="{{ URL::to('/') }}/upload/services/ec/{{ $services->ec }}">Download</a><br>
                                                @endif
                                            @endif

                                        </div>
                                        @elseif ($serviceid == 219 )
                                        <div class="mb-3 col-md-6">
                                            <label for="patta_no" class="form-label">பட்டா அல்லது சிட்டா எண்</label>
                                            <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required
                                                type="text" maxlength="20" class="form-control"
                                                value="{{ $services->patta_no }}" name="patta_no"
                                                placeholder="பட்டா அல்லது சிட்டா எண்" />
                                            @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                                                @if ($services->aadhaar_card != '')
                                                    <label>ஆதார் கார்டு</label>
                                                    <br><a target="_blank"
                                                        href="{{ URL::to('/') }}/upload/services/aadhaar_card/{{ $services->aadhaar_card }}"
                                                        class="btn btn-primary me-2">View</a><br>
                                                @endif
                                            @else
                                                <label>ஆதார் கார்டு</label>
                                                <input @if ($services->aadhaar_card == '') required @endif
                                                    class="form-control" type="file" name="aadhaar_card">
                                                @if ($services->aadhaar_card != '')
                                                    <a target="_blank"
                                                        href="{{ URL::to('/') }}/upload/services/aadhaar_card/{{ $services->aadhaar_card }}">Download</a><br>
                                                @endif
                                            @endif
                                            
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="mobile" class="form-label">கைபேசி எண்(ஆதார் அட்டையில் பதிவு செய்யப்பட்ட கைபேசி எண்)</label>
                                            <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required
                                                type="text" maxlength="10" class="form-control"
                                                value="{{ $services->mobile }}" name="mobile"
                                                placeholder="கைபேசி எண்" />
                                        </div>
                                   
                                    @endif
                                    @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
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
                                                <option @if ($services->status == 'Rejected') selected @endif value="Rejected">
                                                Rejected</option>
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
                                                <option @if ($services->lects == 'Text') selected @endif value = "Text">Text</option>
                                                <option @if ($services->lects == 'File') selected @endif value = "File">File</option>
                                            </select>
                                    </div>
                                    <div class="mb-3 col-md-6" id="applicationhide" style="display :none;">
                                        <label for="application" class="form-label">Application</label>
                                        <input value="{{ $services->application }}" class="form-control"
                                        type="text" maxlength="150" name="application"
                                        id="application" />
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
                                            <input value="{{ $services->status }}" class="form-control"
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
                                    @if ($services->status == 'Resubmit' && ($services->user_id != Auth::user()->id && $apply_user_id != Auth::user()->id))
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
        var dist_id = "{{ $services->dist_id }}";
        var taluk_id = "{{ $services->taluk_id }}";
        $(function() {
            var status = "{{ $services->status }}";
            var acknowledgement = "{{ $services->acknowledgement }}";
            var certificate = "{{ $services->certificate }}";
            var selects = "{{ $services->selects }}";
            var lects = "{{ $services->lects }}";

            gettaluk(dist_id);
            getpanchayath(taluk_id);

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
                    $('#remarkshide').show("slow");
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

            $('#select').change(function(){
                if($('#select').val() == 'Text') {
                    $('#applicationnohide').show("slow");
                    $('#application_no').prop("required", true); 
                    $('#acknowledgementhide').hide("slow");
                    $('#acknowledgement').prop("required", false);
                }else if($('#select').val() == 'File'){
                    $('#acknowledgementhide').show("slow");
                    $('#acknowledgement').prop("required", false);
                    $('#applicationnohide').hide("slow"); 
                    $('#application_no').prop("required", false);
                }else{
                    $('#applicationnohide').hide("slow");
                    $('#application_no').prop("required", false);
                    $('#acknowledgementhide').hide("slow");
                    $('#acknowledgement').prop("required", false);
                }  
            });

            $('#selects').change(function(){
                if($('#selects').val() == 'Text') {
                    $('#applicationhide').show("slow");
                    $('#application').prop("required", true); 
                    $('#certhide').hide("slow");
                    $('#certificate').prop("required", false);
                }else if($('#selects').val() == 'File'){
                    $('#certhide').show("slow");
                    $('#certificate').prop("required", false);
                    $('#applicationhide').hide("slow"); 
                    $('#application').prop("required", false);
                }else{
                    $('#applicationhide').hide("slow");
                    $('#application').prop("required", false);
                    $('#certhide').hide("slow");
                    $('#certificate').prop("required", false);
                }  
            });

        function gettaluk(dist_id) {
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
                    $("#taluk").val("{{ $services->taluk_id }}");

                }
            });
        }
    </script>
@endpush
