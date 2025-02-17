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
                            <form action="{{ url('/voterid_update') }}" id="formAccountSettings"
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
                                        if ($services->retailer_id == 0) {
                                            $apply_user_id = $services->distributor_id;
                                        } elseif ($services->distributor_id == 0) {
                                            $apply_user_id = $services->retailer_id;
                                        }
                                    @endphp

                                   @if ($serviceid == 113)
                                    <div class="mb-3 col-md-4">
                                        <label for="name" class="form-label">Name</label>
                                        <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required type="text"
                                            value="{{ $services->name }}" class="form-control" name="name"
                                            maxlength="30" placeholder="Name" /> 
                                        <label for="mobile" class="form-label">Mobile Number</label>
                                        <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required type="text"
                                            value="{{ $services->mobile }}" class="form-control number" name="mobile"
                                            maxlength="10" placeholder="Mobile Number" />
                                        <label for="relationship" class="form-label">Relationship</label>
                                        <select @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif class="form-control"
                                            name="relationship">
                                            <option value="">Select</option>
                                            <option @if ($services->relationship == 'Father') selected @endif value="Father">Father.
                                            </option>
                                            <option @if ($services->relationship == 'Brother') selected @endif value="Brother">Brother.
                                            </option>
                                            <option @if ($services->relationship == 'Sister') selected @endif value="Sister">Sister.
                                            </option>
                                        </select>     
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                                        @if ($services->photo != '')
                                            <label>Photo</label>
                                            <br><a target="_blank"
                                                href="{{ URL::to('/') }}/upload/services/photo/{{ $services->photo }}"
                                                class="btn btn-primary me-2">View</a><br>
                                        @endif
                                    @else
                                        <label>Photo</label>
                                        <input @if ($services->photo == '') required @endif class="form-control"
                                            type="file" accept="image/jpeg, image/png" name="photo">
                                        @if ($services->photo != '')
                                            <a target="_blank"
                                                href="{{ URL::to('/') }}/upload/services/photo/{{ $services->photo }}">Download</a><br>
                                        @endif
                                    @endif
                                            @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                                                @if ($services->aadhaar_card != '')
                                                    <label>Aadhaar Card</label>
                                                    <br><a target="_blank"
                                                        href="{{ URL::to('/') }}/upload/services/aadhaar_card/{{ $services->aadhaar_card }}"
                                                        class="btn btn-primary me-2">View</a><br>
                                                @endif
                                            @else
                                                <label>Aadhaar Card</label>
                                                <input @if ($services->aadhaar_card == '') required @endif class="form-control"
                                                    type="file" accept="image/jpeg, image/png" name="aadhaar_card">
                                                @if ($services->aadhaar_card != '')
                                                    <a target="_blank"
                                                        href="{{ URL::to('/') }}/upload/services/aadhaar_card/{{ $services->aadhaar_card }}">Download</a><br>
                                                @endif
                                            @endif
                                            @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                                            @if ($services->voter_id != '')
                                                <label>Relative Voter Id</label>
                                                <br><a target="_blank"
                                                    href="{{ URL::to('/') }}/upload/services/voter_id/{{ $services->voter_id }}"
                                                    class="btn btn-primary me-2">View</a><br>
                                            @endif
                                        @else
                                            <label>Relative Voter Id</label>
                                            <input @if ($services->voter_id == '') required @endif class="form-control"
                                                type="file" accept="image/jpeg, image/png" name="voter_id">
                                            @if ($services->voter_id != '')
                                                <a target="_blank"
                                                    href="{{ URL::to('/') }}/upload/services/voter_id/{{ $services->voter_id }}">Download</a><br>
                                            @endif
                                        @endif 
                                        
                                    </div>
                                    
                                    @elseif ($serviceid == 120)
                                    <div class="mb-3 col-md-6">
                                        <label for="epic_no" class="form-label">Epic No</label>
                                        <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required type="text"
                                            value="{{ $services->epic_no }}" class="form-control" name="epic_no"
                                            maxlength="15" placeholder="Epic No" />
                                        <label for="mobile" class="form-label">Mobile Number</label>
                                        <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required type="text"
                                            value="{{ $services->mobile }}" class="form-control number" name="mobile"
                                            maxlength="10" placeholder="Mobile Number" />
                                    </div>
                                    <div class="mb-3 col-md-6">

                                        @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                                            @if ($services->aadhaar_card != '')
                                                <label>Old Voter ID/Aadhar Card</label>
                                                <br><a target="_blank"
                                                    href="{{ URL::to('/') }}/upload/services/aadhaar_card/{{ $services->aadhaar_card }}"
                                                    class="btn btn-primary me-2">View</a><br>
                                            @endif
                                        @else
                                            <label>Old Voter ID/Aadhar Card</label>
                                            <input @if ($services->aadhaar_card == '') required @endif class="form-control"
                                                type="file" accept="image/jpeg, image/png" name="aadhaar_card">
                                            @if ($services->aadhaar_card != '')
                                                <a target="_blank"
                                                    href="{{ URL::to('/') }}/upload/services/aadhaar_card/{{ $services->aadhaar_card }}">Download</a><br>
                                            @endif
                                        @endif
                                       
                                    </div>
                                    @elseif ($serviceid == 164)
                                    <div class="mb-3 col-md-6">
                                        <label for="epic_no" class="form-label">Epic No</label>
                                        <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required type="text"
                                            value="{{ $services->epic_no }}" class="form-control" name="epic_no"
                                            maxlength="15" placeholder="Epic No" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="mobile" class="form-label">Mobile Number</label>
                                        <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required type="text"
                                            value="{{ $services->mobile }}" class="form-control number" name="mobile"
                                            maxlength="10" placeholder="Mobile Number" />
                                    </div>
                                    
                                    @elseif ($serviceid == 182)
                                    <div class="mb-3 col-md-6">
                                        <label for="epic_no" class="form-label">Epic No</label>
                                        <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required type="text"
                                            value="{{ $services->epic_no }}" class="form-control" name="epic_no"
                                            maxlength="15" placeholder="Epic No" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="mobile" class="form-label">Mobile Number</label>
                                        <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required type="text"
                                            value="{{ $services->mobile }}" class="form-control number" name="mobile"
                                            maxlength="10" placeholder="Mobile Number" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        @if (Auth::user()->id != $apply_user_id )
                                            @if ($services->voter_id != '')
                                                <label>Voter ID</label>
                                                <br><a target="_blank"
                                                    href="{{ URL::to('/') }}/upload/services/voter_id/{{ $services->voter_id }}"
                                                    class="btn btn-primary me-2">View</a><br>
                                            @endif
                                        @else
                                            <label>Voter ID</label>
                                            <input @if ($services->voter_id == '') required @endif class="form-control"
                                                type="file" accept="image/jpeg, image/png" name="voter_id">
                                            @if ($services->voter_id != '')
                                                <a target="_blank"
                                                    href="{{ URL::to('/') }}/upload/services/voter_id/{{ $services->voter_id }}">Download</a><br>
                                            @endif
                                        @endif                                       
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        @if (Auth::user()->id != $apply_user_id )
                                            @if ($services->aadhaar_card != '')
                                                <label>Aadhar Card</label>
                                                <br><a target="_blank"
                                                    href="{{ URL::to('/') }}/upload/services/aadhaar_card/{{ $services->aadhaar_card }}"
                                                    class="btn btn-primary me-2">View</a><br>
                                            @endif
                                        @else
                                            <label>Aadhar Card</label>
                                            <input @if ($services->aadhaar_card == '') required @endif class="form-control"
                                                type="file" accept="image/jpeg, image/png" name="aadhaar_card">
                                            @if ($services->aadhaar_card != '')
                                                <a target="_blank"
                                                    href="{{ URL::to('/') }}/upload/services/aadhaar_card/{{ $services->aadhaar_card }}">Download</a><br>
                                            @endif
                                        @endif                                       
                                    </div>
                                    @elseif ($serviceid == 181)
                                    @foreach ($votercorrection_services as $ser)
                                    <div class="mb-3 col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $ser->user_id) disabled @endif required type="text"
                                            value="{{ $ser->name }}" class="form-control" name="name"
                                            maxlength="30" placeholder="Name" />
                                    </div>
                                                                    
                                    <div class="mb-3 col-md-6">
                                    <label for="mobile" class="form-label">Mobile Number</label>
                                        <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $ser->user_id) disabled @endif required type="text"
                                            value="{{ $ser->mobile }}" class="form-control number" name="mobile"
                                            maxlength="10" placeholder="Mobile Number" />
                                    </div>
                                    <div class="mb-3 col-md-6">

                                        @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $ser->user_id)
                                            @if ($ser->aadhaar_card != '')
                                                <label>Aadhar Card (Front & Back)</label>
                                                <br><a target="_blank"
                                                    href="{{ URL::to('/') }}/upload/services/aadhaar_card/{{ $ser->aadhaar_card }}"
                                                    class="btn btn-primary me-2">View</a><br>
                                            @endif
                                        @else
                                            <label>Aadhar Card (Front & Back)</label>
                                            <input @if ($ser->aadhaar_card == '') required @endif class="form-control"
                                                type="file" accept="image/jpeg, image/png" name="aadhaar_card">
                                            @if ($ser->aadhaar_card != '')
                                                <a target="_blank"
                                                    href="{{ URL::to('/') }}/upload/services/aadhaar_card/{{ $ser->aadhaar_card }}">Download</a><br>
                                            @endif
                                        @endif
                                       
                                    </div>
                                    <div class="mb-3 col-md-6">

                                        @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $ser->user_id)
                                            @if ($ser->voter_id != '')
                                                <label>Voter Id</label>
                                                <br><a target="_blank"
                                                    href="{{ URL::to('/') }}/upload/services/voter_id/{{ $ser->voter_id }}"
                                                    class="btn btn-primary me-2">View</a><br>
                                            @endif
                                        @else
                                            <label>Voter Id</label>
                                            <input @if ($ser->voter_id == '') required @endif class="form-control"
                                                type="file" accept="image/jpeg, image/png" name="voter_id">
                                            @if ($ser->voter_id != '')
                                                <a target="_blank"
                                                    href="{{ URL::to('/') }}/upload/services/voter_id/{{ $ser->voter_id }}">Download</a><br>
                                            @endif
                                        @endif
                                       
                                    </div>
                                    <div class="row">
                                        <table id="pricetable" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>VOTER ID CORRECTION</th>
                                                    <th>WRONG DATA</th>
                                                    <th>NEW DATA</th>
                                                    <th>CORRECTION DOCUMENTS</th>
                                                    <th>DOCUMENTS</th>
                                                    <th><a class="btn btn-sm btn-success" onclick="addnewrow()"><i class='mdi mdi-plus-circle-outline'></i></a></th>
                                                </tr>
                                            </thead>
                                        <tbody>
                                            <tr>
                                                <td> <select required name="voterid_correction[]" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="NAME">NAME</option>
                                                        <option value="GENDER">GENDER</option>
                                                        <option value="DOB/AGE">DOB/AGE</option>
                                                        <option value="RELATION TYPE">RELATION TYPE</option>
                                                        <option value="RELATIVE NAME">RELATIVE NAME</option>
                                                        <option value="ADDRESS">ADDRESS</option>
                                                        <option value="MOBILE NO">MOBILE NO</option>
                                                        <option value="PHOTO">PHOTO</option>
                                                    </select></td>
            
                                                                    <td><input required class="form-control" type="text"
                                                                            name="wrong_data[]" maxlength="70"></td>
                                                                            <td><input required class="form-control" type="text"
                                                                                name="new_data[]" maxlength="70"></td>
                                                                    <td><select required name="correction_documents[]"
                                                                            class="form-control correction_docs">
                                                                            <option value="">Select</option>
                                                                            <option value="Name Correction">Name Correction</option>
                                                                            <option value="Gender Correction">Gender Correction</option>
                                                                            <option value="DOB/AGE Correction">DOB/AGE Correction</option>
                                                                            <option value="Relation Type Correction">Relation Type Correction</option>
                                                                            <option value="Relative Name Correction">Relative Name Correction</option>
                                                                            <option value="Address Correction">Address Correction</option>
                                                                            <option value="Mobile No Correction">Mobile No Correction</option>
                                                                            <option value="Photo Correction">Photo Correction</option>
                                                                        </select></td>
                                                                    <td><P class='changename'></P>
                                                                        <input required class="form-control" type="file"
                                                                            name="doc[]" accept="image/jpeg, image/png">
                                                                    </td>
                                                                    <td><a onClick='removerow()' class='btn btn-sm btn-danger btnDelete'><i class='mdi mdi-trash-can-outline'></i></a></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                @foreach
                                    @endif

                                    @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
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
        $(function() {
            var status = "{{ $services->status }}";
            var acknowledgement = "{{ $services->acknowledgement }}";

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
    </script>
@endpush
