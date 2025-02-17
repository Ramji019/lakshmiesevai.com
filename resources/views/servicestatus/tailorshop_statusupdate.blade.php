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
                            <form action="{{ url('/tailorshop_update') }}" id="formAccountSettings" method="POST"
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
                         @if($serviceid == 152)
                         <div class="mb-3 col-md-4">
                         <label for="name" class="form-label">Name</label>
                         <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text" value="{{ $services->name }}"  class="form-control"
                         name="name" maxlength="30" placeholder="Name"/>
                         <label for="door_no" class="form-label">Door No</label>
                         <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text" value="{{ $services->door_no }}"  class="form-control"
                         name="door_no" maxlength="20" placeholder="Door No"/>
                         <label for="dist_id" class="form-label">District</label>
                                 <select @if (Auth::user()->id != $apply_user_id) disabled @endif name="dist_id"
                                 id="dist_id" class="form-control">
                                 <option value="">Select District</option>
                                 @foreach ($districts as $d)
                                 <option @if ($d->id == $services->dist_id) selected @endif
                                 value="{{ $d->id }}">{{ $d->district_name }}</option>
                                 @endforeach
                                 </select>
                                 <label for="pincode" class="form-label">Pincode</label>
                                 <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text" maxlength="10" class="form-control" value="{{ $services->pincode }}"
                                 name="pincode" placeholder="Pincode"/>
                         
                         
                     </div>
                         <div class="mb-3 col-md-4">
                             <label for="significant" class="form-label">Significant</label>
                             <select @if (Auth::user()->id != $apply_user_id) disabled @endif required name="significant"
                                 id="significant" class="form-control">
                                 <option value="">Select Significant</option>
                                 <option @if ($services->significant == 'S/O') selected @endif value="S/O">
                                     S/O</option>
                                 <option @if ($services->significant == 'D/O') selected @endif value="D/O">
                                     D/O</option>
                                 <option @if ($services->significant == 'W/O') selected @endif value="W/O">
                                     W/O</option>
                                 </select>
                             <label for="street_name" class="form-label">Street name</label>
                             <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text" maxlength="20" class="form-control" value="{{ $services->street_name }}"
                             name="street_name" placeholder="Street name"/>
                             <label for="taluk_id" class="form-label">Taluk</label>
                             <select @if (Auth::user()->id != $apply_user_id) disabled @endif name="taluk_id" id="taluk" class="form-control">
                             </select>
                                 <label for="course_name" class="form-label">Course name</label>
                             <select @if (Auth::user()->id != $apply_user_id) disabled @endif required name="course_name"
                                 id="course_name" class="form-control">
                                 <option value="">Select Course name</option>
                                 <option @if ($services->course_name == 'Tailoring & Embroidering') selected @endif value="Tailoring & Embroidering">
                                     Tailoring & Embroidering</option>
                                 <option @if ($services->course_name == 'Aari work & Designing') selected @endif value="Aari work & Designing">
                                     Aari work & Designing</option>
                                 <option @if ($services->course_name == 'Tailoring') selected @endif value="Tailoring">
                                     Tailoring</option>
                                 </select>
                             </div>
                             <div class="mb-3 col-md-4">
                             <label for="father_or_hus_name" class="form-label">Father /Husband Name</label>
                             <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text" maxlength="30" class="form-control" value="{{ $services->father_or_hus_name }}"
                             name="father_or_hus_name" placeholder="Father or Husband Name"/>
                             <label for="aadhaar_no" class="form-label">Aadhaar Number</label>
                         <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text" value="{{ $services->aadhaar_no }}"  class="form-control"
                         name="aadhaar_no" maxlength="12" placeholder="Aadhaar Number"/>
                             
                             <label for="panchayath_id" class="form-label">Postal Area</label>
                             <select @if (Auth::user()->id != $apply_user_id) disabled @endif name="panchayath_id"
                                 id="panchayath" class="form-control">
                             </select>
                                                             
                             @if (Auth::user()->id != $apply_user_id)
                             @if ($services->photo != '')
                                 <label>Photo</label>
                                 <br><a target="_blank"
                                     href="{{ URL::to('/') }}/upload/services/photo/{{ $services->photo }}"
                                     class="btn btn-primary me-2">View</a><br>
                             @endif
                         @else
                             <label>Photo</label>
                             <input @if ($services->photo == '') required @endif class="form-control"
                                 type="file" name="photo">
                             @if ($services->photo != '')
                                 <a target="_blank"
                                     href="{{ URL::to('/') }}/upload/services/photo/{{ $services->photo }}">Download</a><br>
                             @endif
                         @endif
                     </div> 
                     @elseif($serviceid == 153) 
                     <div class="mb-3 col-md-4">
                         <label for="name" class="form-label">Name</label>
                         <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text" value="{{ $services->name }}"  class="form-control"
                         name="name" maxlength="30" placeholder="Name"/>
                         <label for="door_no" class="form-label">Door No</label>
                         <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text" value="{{ $services->door_no }}"  class="form-control"
                         name="door_no" maxlength="20" placeholder="Door No"/>
                         <label for="dist_id" class="form-label">District</label>
                                 <select @if (Auth::user()->id != $apply_user_id) disabled @endif name="dist_id"
                                 id="dist_id" class="form-control">
                                 <option value="">Select District</option>
                                 @foreach ($districts as $d)
                                 <option @if ($d->id == $services->dist_id) selected @endif
                                 value="{{ $d->id }}">{{ $d->district_name }}</option>
                                 @endforeach
                                 </select>
                                 <label for="pincode" class="form-label">Pincode</label>
                                 <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text" maxlength="10" class="form-control" value="{{ $services->pincode }}"
                                 name="pincode" placeholder="Pincode"/>
                         
                     </div>
                         <div class="mb-3 col-md-4">
                             <label for="significant" class="form-label">Significant</label>
                             <select @if (Auth::user()->id != $apply_user_id) disabled @endif required name="significant"
                                 id="significant" class="form-control">
                                 <option value="">Select Significant</option>
                                 <option @if ($services->significant == 'S/O') selected @endif value="S/O">
                                     S/O</option>
                                 <option @if ($services->significant == 'D/O') selected @endif value="D/O">
                                     D/O</option>
                                 <option @if ($services->significant == 'W/O') selected @endif value="W/O">
                                     W/O</option>
                                 </select>
                             <label for="street_name" class="form-label">Street name</label>
                             <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text" maxlength="20" class="form-control" value="{{ $services->street_name }}"
                             name="street_name" placeholder="Street name"/>
                             <label for="taluk_id" class="form-label">Taluk</label>
                             <select @if (Auth::user()->id != $apply_user_id) disabled @endif name="taluk_id" id="taluk" class="form-control">
                             </select>
                             <label for="course_name" class="form-label">Course name</label>
                             <select @if (Auth::user()->id != $apply_user_id) disabled @endif required name="course_name"
                                 id="course_name" class="form-control">
                                 <option value="">Select Course name</option>
                                 <option @if ($services->course_name == 'Tally') selected @endif value="Tally">
                                     Tally</option>
                                 <option @if ($services->course_name == 'C++') selected @endif value="C++">
                                     C++</option>
                                 <option @if ($services->course_name == 'JAVA') selected @endif value="JAVA">
                                     JAVA</option>
                                 <option @if ($services->course_name == 'PHP') selected @endif value="PHP">
                                     PHP</option>
                                 <option @if ($services->course_name == 'JAVA SCRIPT') selected @endif value="JAVA SCRIPT">
                                     JAVA SCRIPT</option>
                                 <option @if ($services->course_name == 'TALLY ERP 9') selected @endif value="TALLY ERP 9">
                                     TALLY ERP 9</option>
                                 <option @if ($services->course_name == 'DESKTOP PUBLISHING(DTP)') selected @endif value="DESKTOP PUBLISHING(DTP)">
                                     DESKTOP PUBLISHING(DTP)</option>
                                 </select>
                             </div>
                             <div class="mb-3 col-md-4">
                                 <label for="father_or_hus_name" class="form-label">Father /Husband Name</label>
                                 <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text" maxlength="30" class="form-control" value="{{ $services->father_or_hus_name }}"
                                 name="father_or_hus_name" placeholder="Father or Husband Name"/>
                                 <label for="aadhaar_no" class="form-label">Aadhaar Number</label>
                                 <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text" value="{{ $services->aadhaar_no }}"  class="form-control"
                                 name="aadhaar_no" maxlength="12" placeholder="Aadhaar Number"/>
                                 
                                 <label for="panchayath_id" class="form-label">Postal Area</label>
                                 <select @if (Auth::user()->id != $apply_user_id) disabled @endif name="panchayath_id"
                                     id="panchayath" class="form-control">
                                 </select>
                                                                 
                                 @if (Auth::user()->id != $apply_user_id)
                                 @if ($services->photo != '')
                                     <label>Photo</label>
                                     <br><a target="_blank"
                                         href="{{ URL::to('/') }}/upload/services/photo/{{ $services->photo }}"
                                         class="btn btn-primary me-2">View</a><br>
                                 @endif
                             @else
                                 <label>Photo</label>
                                 <input @if ($services->photo == '') required @endif class="form-control"
                                     type="file" name="photo">
                                 @if ($services->photo != '')
                                     <a target="_blank"
                                         href="{{ URL::to('/') }}/upload/services/photo/{{ $services->photo }}">Download</a><br>
                                 @endif
                             @endif
                     </div>  
                     @elseif($serviceid == 154)
                     <div class="mb-3 col-md-4">
                         <label for="name" class="form-label">Name</label>
                         <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text" value="{{ $services->name }}"  class="form-control"
                         name="name" maxlength="30" placeholder="Name"/>
                         <label for="door_no" class="form-label">Door No</label>
                         <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text" value="{{ $services->door_no }}"  class="form-control"
                         name="door_no" maxlength="20" placeholder="Door No"/>
                         <label for="dist_id" class="form-label">District</label>
                                 <select @if (Auth::user()->id != $apply_user_id) disabled @endif name="dist_id"
                                 id="dist_id" class="form-control">
                                 <option value="">Select District</option>
                                 @foreach ($districts as $d)
                                 <option @if ($d->id == $services->dist_id) selected @endif
                                 value="{{ $d->id }}">{{ $d->district_name }}</option>
                                 @endforeach
                                 </select>
                                 <label for="pincode" class="form-label">Pincode</label>
                                 <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text" maxlength="10" class="form-control" value="{{ $services->pincode }}"
                                 name="pincode" placeholder="Pincode"/>
                         
                     </div>
                         <div class="mb-3 col-md-4">
                             <label for="significant" class="form-label">Significant</label>
                             <select @if (Auth::user()->id != $apply_user_id) disabled @endif required name="significant"
                                 id="significant" class="form-control">
                                 <option value="">Select Significant</option>
                                 <option @if ($services->significant == 'S/O') selected @endif value="S/O">
                                     S/O</option>
                                 <option @if ($services->significant == 'D/O') selected @endif value="D/O">
                                     D/O</option>
                                 <option @if ($services->significant == 'W/O') selected @endif value="W/O">
                                     W/O</option>
                                 </select>
                             <label for="street_name" class="form-label">Street name</label>
                             <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text" maxlength="20" class="form-control" value="{{ $services->street_name }}"
                             name="street_name" placeholder="Street name"/>
                             <label for="taluk_id" class="form-label">Taluk</label>
                             <select @if (Auth::user()->id != $apply_user_id) disabled @endif name="taluk_id" id="taluk" class="form-control">
                             </select>
                             <label for="course_name" class="form-label">Course name</label>
                             <select @if (Auth::user()->id != $apply_user_id) disabled @endif required name="course_name"
                                 id="course_name" class="form-control">
                                 <option value="">Select Course name</option>
                                 <option @if ($services->course_name == 'Mehanthi') selected @endif value="Mehanthi">
                                     Mehanthi</option>
                                 <option @if ($services->course_name == 'Facial and hair Dressing') selected @endif value="Facial and hair Dressing">
                                     Facial and hair Dressing</option>
                                 </select>
                             </div>
                             <div class="mb-3 col-md-4">
                                 <label for="father_or_hus_name" class="form-label">Father /Husband Name</label>
                                 <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text" maxlength="30" class="form-control" value="{{ $services->father_or_hus_name }}"
                                 name="father_or_hus_name" placeholder="Father or Husband Name"/>
                                 <label for="aadhaar_no" class="form-label">Aadhaar Number</label>
                                 <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text" value="{{ $services->aadhaar_no }}"  class="form-control"
                                 name="aadhaar_no" maxlength="12" placeholder="Aadhaar Number"/>
                                 
                                 <label for="panchayath_id" class="form-label">Postal Area</label>
                                 <select @if (Auth::user()->id != $apply_user_id) disabled @endif name="panchayath_id"
                                     id="panchayath" class="form-control">
                                 </select>
                                                                 
                                 @if (Auth::user()->id != $apply_user_id)
                                 @if ($services->photo != '')
                                     <label>Photo</label>
                                     <br><a target="_blank"
                                         href="{{ URL::to('/') }}/upload/services/photo/{{ $services->photo }}"
                                         class="btn btn-primary me-2">View</a><br>
                                 @endif
                             @else
                                 <label>Photo</label>
                                 <input @if ($services->photo == '') required @endif class="form-control"
                                     type="file" name="photo">
                                 @if ($services->photo != '')
                                     <a target="_blank"
                                         href="{{ URL::to('/') }}/upload/services/photo/{{ $services->photo }}">Download</a><br>
                                 @endif
                             @endif
                     </div> 
                       @endif

                                    @if (Auth::user()->id != $apply_user_id)
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
           
            var dist_id = "{{ $services->dist_id }}";
            var taluk_id = "{{ $services->taluk_id }}";
    
        gettaluk(dist_id);
        getpanchayath(taluk_id);

            var status = "{{ $services->status }}";
            var acknowledgement = "{{ $services->acknowledgement }}";
            var certificate = "{{ $services->certificate }}";
           
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

        function gettaluk(dist_id) {
        var url = "{{ url('service/get_taluk') }}/" + dist_id;
        $.ajax({
            url: url,
            type: "GET",
            success: function (result) {
                $('#taluk').html('<option value="">-- Select Taluk Name --</option>');
                $.each(result, function (key, value) {
                    $("#taluk").append('<option value="' + value
                        .id + '">' + value.taluk_name + '</option>');
                });
                $("#taluk").val("{{ $services->taluk_id }}");

            }
        });
    }

    function getpanchayath(taluk_id) {
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
                $("#panchayath").val("{{ $services->panchayath_id }}");

            }
        });
    }

    </script>
@endpush
