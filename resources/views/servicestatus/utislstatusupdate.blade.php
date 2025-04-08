@extends('layouts.app')
@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
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
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card rounded-4 border-top border-4 border-primary border-gradient-1">
                        <div class="card-body p-4">
                            <h5 class="card-title">{{ $servicename }}</h5>
                            <form action="{{ url('/utislupdate') }}" id="formAccountSettings" method="POST"
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
                                    @if ($serviceid == 217)
                                        <div class="mb-3 col-md-6">
                                            <label for="name" class="form-label">Name</label>
                                            <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required
                                                class="form-control" name="name" type="text" maxlength="30"
                                                value="{{ $services->name }}" style="width: 100%;" placeholder="Name">

                                            @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                                                @if ($services->aadhaar_pdf != '')
                                                    <label>Aadhaar Pdf</label>
                                                    <br><a target="_blank"
                                                        href="{{ URL::to('/') }}/upload/services/aadhaarpdf/{{ $services->aadhaar_pdf }}"
                                                        class="btn btn-primary me-2">View</a><br>
                                                @endif
                                            @else
                                                <label>Aadhaar Pdf</label>
                                                <input @if ($services->aadhaar_pdf == '') required @endif
                                                    class="form-control" type="file" name="aadhaar_pdf"
                                                    accept="application/pdf,image/x-eps">
                                                @if ($services->aadhaar_pdf != '')
                                                    <a target="_blank"
                                                        href="{{ URL::to('/') }}/upload/services/aadhaarpdf/{{ $services->aadhaar_pdf }}">Download</a><br>
                                                @endif
                                            @endif

                                            @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                                                @if ($services->signature != '')
                                                    <label>Signature</label>
                                                    <br><a target="_blank"
                                                        href="{{ URL::to('/') }}/upload/services/signature/{{ $services->signature }}"
                                                        class="btn btn-primary me-2">View</a><br>
                                                @endif
                                            @else
                                                <label>Signature</label>
                                                <input @if ($services->signature == '') required @endif
                                                    class="form-control" type="file" name="signature">
                                                @if ($services->signature != '')
                                                    <a target="_blank"
                                                        href="{{ URL::to('/') }}/upload/services/signature/{{ $services->signature }}">Download</a><br>
                                                @endif
                                            @endif

                                            <label for="father_name" class="form-label">Father Name</label>
                                            <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required
                                                class="form-control" name="father_name" type="text" maxlength="50"
                                                value="{{ $services->father_name }}" style="width: 100%;"
                                                placeholder="Father Name">

                                        </div>

                                        <div class="mb-3 col-md-6">


                                            <label for="mobile" class="form-label">Mobile</label>
                                            <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required
                                                class="form-control number" name="mobile" type="text" maxlength="10"
                                                value="{{ $services->mobile }}" style="width: 100%;"
                                                placeholder="Mobile No">

                                            @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                                                @if ($services->photo != '')
                                                    <label>Photo</label>
                                                    <br><a target="_blank"
                                                        href="{{ URL::to('/') }}/upload/services/photo/{{ $services->photo }}"
                                                        class="btn btn-primary me-2">View</a><br>
                                                @endif
                                            @else
                                                <label>Photo</label>
                                                <input @if ($services->signature == '') required @endif
                                                    class="form-control" type="file" name="photo">
                                                @if ($services->photo != '')
                                                    <a target="_blank"
                                                        href="{{ URL::to('/') }}/upload/services/photo/{{ $services->photo }}">Download</a><br>
                                                @endif
                                            @endif

                                            <label for="email" class="form-label">E-MAIL</label>
                                            <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required
                                                class="form-control" name="email" type="text" maxlength="70"
                                                value="{{ $services->email }}" style="width: 100%;"
                                                placeholder="Email">

                                            <label for="date_of_birth" class="form-label">Date Of Birth</label>
                                            <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required
                                                class="form-control" name="date_of_birth" type="date"
                                                value="{{ $services->date_of_birth }}" maxlength="70"
                                                style="width: 100%;">

                                        </div>
                                    @endif
                                    @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                                        <div class="mb-3 col-md-6">
                                            <label for="service_name" class="form-label">Service Status</label>
                                            <select class="form-control" name="status" id="service_status">
                                                <option value="">Select</option>
                                                <option @if ($services->status == 'Pending') selected @endif value="Pending">
                                                    Pending</option>
                                                <option @if ($services->status == 'Resubmit') selected @endif
                                                    value="Resubmit">Resubmit</option>
                                                <option @if ($services->status == 'Processing') selected @endif
                                                    value="Processing">Processing</option>
                                                @if ($services->status != 'Approved')
                                                    <option @if ($services->status == 'Rejected') selected @endif
                                                        value="Rejected">
                                                        Rejected</option>
                                                @endif
                                                <option @if ($services->status == 'Approved') selected @endif
                                                    value="Approved">Approved</option>
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
                                                type="text" maxlength="20" name="application_no"
                                                id="application_no" />
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
                                            <input value="{{ $services->application }}" class="form-control"
                                                type="text" maxlength="150" name="application" id="application" />
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
        </div>
    </main>
@endsection
@push('page_scripts')
    <script>
        $(function() {
            var status = "{{ $services->status }}";
            var acknowledgement = "{{ $services->acknowledgement }}";
            var certificate = "{{ $services->certificate }}";
            var selects = "{{ $services->selects }}";
            var lects = "{{ $services->lects }}";

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
    </script>
@endpush
