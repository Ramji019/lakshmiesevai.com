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
                            <form class="row g-4" action="{{ url('submitapply_tnegaservices2') }}" enctype="multipart/form-data"
                                method="post">
                                @csrf
                               <div class="row">
                        <input type="hidden" name="serviceid" value="{{ $serviceid }}">
                        <input type="hidden" name="amount" value="{{ $amount }}">
                        <input type="hidden" name="service_amount" value="{{ $payment }}">
                        <input type="hidden" name="user_id" value="{{ $customers->id }}">
                        <div class="row">
                            <div class="col-lg-12">
                                    <div class="mb-3 row">
                                        <label for="example-text-input-lg" class="col-sm-3 form-label">Do You Have Can Number</label>
                                        <div class="col-sm-6">
                                            <select required name="can_details" id="can_details" class="form-control">
                                                <option value="">Select Can Details</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Find">Find Can</option>
                                            </select>
                                        </div>
                                    </div>
                                     <div class="mb-3 row" id="cannumberhide" style="display: none;">
                                            <label for="example-text-input-lg" class="col-sm-3 form-label">Can
                                                Number</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" id="cannumber" type="text"
                                                    name="can_number" value="{{ $customers->can_number }}" maxlength="15">
                                            </div>
                                        </div>
                                        <div class="mb-3">

                                        <div class="row" id="dobhide" style="display: none;">
                                            <h4 class="text-center">Can Details</h4>
                                        <div class="mb-3 col-md-4">
                        <label style="color:#23e156" for="personalized" class="form-label">திரு/திருமதி/செல்வி</label>
                        <select id="personalized" name="personalized" class="form-control">
                            <option value="">Select</option>
                            <option value="திரு">திரு.</option>
                            <option value="திருமதி">திருமதி.</option>
                            <option value="செல்வி">செல்வி.</option>
                        </select>
                        <label style="color:#23e156" for="relationship_1" class="form-label">உறவுமுறை</label>
                        <select id="relationship_1" name="relationship_1" class="form-control">
                            <option value="">Select</option>
                            <option value="தந்தை">தந்தை.</option>
                        </select>
                        <label style="color:#23e156" for="relationship_2" class="form-label">உறவுமுறை</label>
                        <select id="relationship_2" name="relationship_2" class="form-control">
                            <option value="">Select</option>
                            <option value="தாய்">தாய்.</option>
                        </select>
                        <label style="color:#23e156" for="relationship_3" class="form-label">உறவுமுறை</label>
                        <select id="relationship_3" name="relationship_3" class="form-control">
                            <option value="">Select</option>
                            <option value="கணவர்">கணவர்.</option>
                            <option value="மனைவி">மனைவி.</option>
                            <option value="உறவினர்">உறவினர்.</option>
                        </select>
                         <label  style="color:#23e156" for="community" class="form-label">Community</label>
                        <select name="community" id="community" class="form-control">
                                <option value="">Select Community</option>
                                <option value="BC">BC</option>
                                <option value="OC">OC</option>
                                <option value="OBC">OBC</option>
                                <option value="MBC">MBC</option>
                                <option value="SC">SC</option>
                                <option value="ST">ST</option>
                                <option value="BC(Muslim)">BC (Muslim)</option>
                            </select>

                         <label style="color:#23e156" for="maritial_status" class="form-label">Maritial Status</label>
                            <select  id="maritial_status" name="maritial_status" class="form-control">
                                    <option value="">Select Maritial Status</option>
                                    <option value="Married">Married</option>
                                    <option value="Single">Single</option>
                                    <option value="Divorced">Divorced</option>
                                    </select>


                        <label style="color:#23e156" for="door_no" class="form-label">Door No</label>
                        <input type="text" maxlength="20" class="form-control"
                        name="door_no" placeholder="Door No"/>
                         <label style="color:#23e156" for="pin_code" class="form-label">Pin Code</label>
                            <input type="text" maxlength="10" class="form-control"
                            name="pin_code" placeholder="Pin Code"/>
                    </div>
                    <div class="mb-3 col-md-4">

                            <label style="color:#e411dd" for="personalized_name_tamil" class="form-label">விண்ணப்பதாரர் பெயர் தமிழில்</label>
                            <input type="text" maxlength="20" class="form-control"
                            name="personalized_name_tamil" placeholder="பெயர் தமிழில்"/>
                            <label style="color:#e411dd" for="relationship_name_tamil_1" class="form-label">பெயர் தமிழில்</label>
                            <input type="text" maxlength="20" class="form-control"
                            name="relationship_name_tamil" placeholder="பெயர் தமிழில்"/>
                            <label style="color:#e411dd" for="relationship_name_tamil_2" class="form-label">பெயர் தமிழில்</label>
                            <input type="text" maxlength="20" class="form-control"
                            name="relationship_name_tamil" placeholder="பெயர் தமிழில்"/>
                            <label style="color:#e411dd" for="relationship_name_tamil_3" class="form-label">பெயர் தமிழில்</label>
                            <input type="text" maxlength="20" class="form-control"
                            name="relationship_name_tamil" placeholder="பெயர் தமிழில்"/>
                            <label style="color:#e411dd" for="caste" class="form-label">Caste</label>
                            <input type="text" maxlength="20" class="form-control"
                            name="caste" placeholder="Caste"/>
                        <label style="color:#e411dd" for="education" class="form-label">Education</label>
                        <input type="text" maxlength="50" class="form-control"
                        name="education" placeholder="Education"/>

                        <label style="color:#e411dd" for="street_name_tamil" class="form-label">தெரு பெயர்</label>
                        <input type="text" maxlength="50" class="form-control"
                        name="street_name_tamil" placeholder="தெரு பெயர்"/>
                        <label style="color:#e411dd" for="postal_name" class="form-label">அஞ்சல் பெயர்</label>
                        <input type="text" maxlength="50" class="form-control"
                        name="postal_name" placeholder="அஞ்சல் பெயர்"/>
                        <!--<label style="color:#e411dd" for="panchayath_id" class="form-label">கிராம நிர்வாக பகுதி</label>
                        <select name="panchayath_id" id="panchayath"  class="form-control">
                        </select>-->
                    </div>
                        <div class="mb-3 col-md-4">

                            <label style="color:#23e156" for="personalized_name_english" class="form-label">Applicant Name</label>
                            <input type="text" maxlength="20" class="form-control"
                            name="personalized_name_english" placeholder="Name In English"/>
                            <label style="color:#23e156" for="relationship_name_english_1" class="form-label">Name In English</label>
                            <input type="text" maxlength="20" class="form-control"
                            name="relationship_name_english_1" placeholder="Name In English"/>
                            <label style="color:#23e156" for="relationship_name_english_2" class="form-label">Name In English</label>
                            <input type="text" maxlength="20" class="form-control"
                            name="relationship_name_english_2" placeholder="Name In English"/>
                            <label style="color:#23e156" for="relationship_name_english_3" class="form-label">Name In English</label>
                            <input type="text" maxlength="20" class="form-control"
                            name="relationship_name_english_3" placeholder="Name In English"/>
                            <label style="color:#23e156" for="religion" class="form-label">Religion</label>
                        <input type="text" maxlength="20" class="form-control"
                        name="religion" placeholder="Religion"/>
                           <label style="color:#23e156" for="work" class="form-label">Work</label>
                        <input type="text" maxlength="50" class="form-control"
                        name="work" placeholder="Work"/>

                            <label style="color:#23e156" for="street_name" class="form-label">Street Name</label>
                            <input type="text" maxlength="30" class="form-control"
                            name="street_name" placeholder="Street Name"/>

                            <label style="color:#23e156" for="village_administrative_area" class="form-label">Postal Area</label>
                        <input type="text" maxlength="20" class="form-control"
                        name="village_administrative_area" placeholder="Postal Area"/>
                        </div>
                     </div>
                    </div>
                </div>
            </div>
                        <h4 class="text-center"> Basic Details </h4>

                          <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input value="{{ $customers->name }}" readonly  required type="text" class="form-control"
                            name="name" placeholder="Name"/>


                            <label for="aadhaar_no" class="form-label">Aadhaar Number</label>
                            <input value="{{ $customers->aadhaar_no }}" readonly required type="text" maxlength="12" class="form-control"
                            name="aadhaar_no" placeholder="Aadhaar Number"/>

                            <label for="mobile" class="form-label number">Mobile Number</label>
                            <input value="{{ $customers->phone }}" readonly required type="text" maxlength="10" class="form-control"
                            name="mobile" placeholder="Mobile Number"/>

                            <label for="dist_id" class="form-label">District</label>
                            <select disabled name="dist_id" id="dist_id" class="form-control">
                                <option value="">Select District</option>
                                @foreach($districts as $d)
                                <option @if($d->id == $customers->dist_id) selected @endif value="{{ $d->id }}">{{ $d->district_name }}</option>
                                @endforeach
                            </select>

                            <label for="taluk_id" class="form-label">Taluk</label>
                            <select disabled name="taluk_id" id="taluk"  class="form-control">
                            </select>
                        </div>

                          <div class="mb-3 col-md-6">
                            <label for="panchayath_id" class="form-label">VAO</label>
                            <input value="{{ $customers->panchayath_name }}" readonly required type="text" class="form-control" name="panchayath_name" placeholder="VAO"/>

                            <label for="aadhaar_card" class="form-label">Aadhaar Card</label>
                            @if($customers->aadhaar_file == "")
                            <br><a  href="#" class="btn btn-primary me-2">No File Uploaded</a><br>
                            @else
                            <br><a target="_blank" href="/upload/users/aadhaar_file/{{ $customers->aadhaar_file }}" class="btn btn-primary me-2">View</a><br>
                            @endif

                            <label for="smart_card" class="form-label">Smart Card</label>
                             @if($customers->smartcard == "")
                             <br><a  href="#" class="btn btn-primary me-2">No File Uploaded</a><br>
                             @else
                            <br><a target="_blank" href="/upload/users/smart_card/{{ $customers->smartcard }}" class="btn btn-primary me-2">View</a><br>
                            @endif
                            <label for="signature" class="form-label">Signature</label>
                             @if($customers->signature == "")
                             <br><a  href="#" class="btn btn-primary me-2">No File Uploaded</a><br>
                             @else
                            <br><a target="_blank" href="/upload/users/signature/{{ $customers->signature }}" class="btn btn-primary me-2">View</a><br>
                            @endif
                            <label for="photo" class="form-label">Photo</label>
                             @if($customers->profile == "")
                             <br><a  href="#" class="btn btn-primary me-2">No File Uploaded</a><br>
                             @else
                            <br><a target="_blank" href="/upload/users/profile_photo/{{ $customers->profile }}" class="btn btn-primary me-2">View</a><br>
                            @endif

                          </div>
                    </div>
                    <div class="row">
                        <h4 class="text-center"> Additional Details </h4>
                        @if($serviceid == 22)
                        <div class="mb-3 col-md-6">
                            <label class="form-label">கணவன் மற்றும் மனைவியின் ஒருங்கிணைந்த புகைப்படம்</label>
                            <input required class="form-control" type="file"
                            name="hus_wife_photo" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">மணமகனின் நிரந்தர சமூகச் சான்றிதழ்</label>
                            <input required class="form-control" type="file"
                            name="permanent_social_certificate_groom" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">மணமகளின் நிரந்தர சமூகச் சான்றிதழ்</label>
                            <input required class="form-control" type="file"
                            name="bride_permanent_social_certificate" />
                            </div>
                            <div class="mb-3 col-md-6">
                            <label class="form-label">திருமணப் பதிவுச் சான்றிதழ்</label>
                            <input required class="form-control" type="file"
                            name="mrg_registration_certificate" />
                            </div>
                            <div class="mb-3 col-md-6">
                            <label class="form-label">ஏதேனும் முகவரி ஆதாரம்</label>
                            <input required class="form-control" type="file"
                            name="anyothers_certificate" />
                            </div>
                            @elseif($serviceid == 23)
                            <div class="mb-3 col-md-6">
                            <label class="form-label">சிட்டா</label>
                            <input required class="form-control" type="file"
                            name="chitta" />
                            </div>
                            <div class="mb-3 col-md-6">
                            <label class="form-label">அடங்கல்</label>
                            <input required class="form-control" type="file"
                            name="aggregation" />
                            </div>
                            <div class="mb-3 col-md-6">
                            <label class="form-label">கூட்டுபட்டாவாக இருந்தால் EC சான்றிதழ்  அல்லது பத்திரம் வேண்டும்</label>
                            <input required class="form-control" type="file"
                            name="ec_certificate" />
                            </div>
                            <div class="mb-3 col-md-6">
                            <label class="form-label">வில்லங்கம்</label>
                            <input required class="form-control" type="file"
                            name="villankam" />
                            </div>
                            <div class="mb-3 col-md-6">
                            <label class="form-label">வீ.ஏ.ஓ சான்று</label>
                            <input required class="form-control" type="file"
                            name="vao_certificate" />
                            </div>
                            <div class="mb-3 col-md-6">
                            <label class="form-label">சுய வாக்குமூலம்</label>
                            <input required class="form-control" type="file"
                            name="self_declaration_certificate" />
                            </div>
                            <div class="mb-3 col-md-6">
                            <label class="form-label">மற்றவைகள் இருந்தால் அதன் நகல்</label>
                            <input required class="form-control" type="file"
                            name="other_certificate" />
                            </div>
                            @elseif($serviceid == 24)
                            <div class="mb-3 col-md-6">
                            <label>வங்கி பாஸ்புக்</label>
                            <input required class="form-control" type="file"
                            name="bank_pass_book">
                            </div>
                            <div class="mb-3 col-md-6">
                           <label>ஏதேனும் ஐடி ஆதாரம்</label>
                            <select required class="form-control" id="other_certificate" name="any_proof"  style="width: 100%;">
                                <option value="">Select Id Proof</option>
                                <option value="Passport">Passport</option>
                                <option value="PAN Card">PAN Card</option>
                                <option value="Voter Id">Voter Id</option>
                                <option value="Driving License">Driving License</option>
                            </select>

                            <div class="" id="pass_porthide" style="display: none;">
                                <label>பாஸ்போர்ட்</label>
                                <input id="pass_port"  class="form-control" type="file"
                                name="passport">
                            </div>
                            <div class="" id="pan_cardhide" style="display: none;">
                                <label>PAN கார்டு</label>
                                <input id="pan_card"  class="form-control" type="file"
                                name="pancard">
                            </div>
                            <div class="" id="voteridhide" style="display: none;">
                                <label>வாக்காளர் ஐடி</label>
                                <input id="voter_id"  class="form-control" type="file"
                                name="voterid">
                            </div>
                            <div class="" id="driving_licensehide" style="display: none;">
                                <label>ஓட்டுநர் உரிமம்</label>
                                <input id="drivinglicense"  class="form-control" type="file"
                                name="driving_license">
                            </div>
                            </div>

                            @elseif($serviceid == 25)
                            <div class="mb-3 col-md-6">
                            <label>வேலை வாய்ப்பு பதிவு</label>
                            <input class="form-control" required type="file"
                            name="placement_registration">
                            </div>
                            <div class="mb-3 col-md-6">
                            <label>பள்ளி மாற்றுச் சான்று</label>
                            <input required class="form-control" type="file"
                            name="school_transfer_certificate">
                            </div>
                            <div class="mb-3 col-md-6">
                            <label>படிப்பு சான்று</label>
                            <input required class="form-control" type="file"
                            name="study_proof">
                            </div>
                            <div class="mb-3 col-md-6">
                            <label>குடும்ப வருமான சான்றிதழ்</label>
                            <input required class="form-control" type="file"
                            name="family_income_certificate">
                        </div>
                        @elseif($serviceid == 26)
                        <div class="mb-3 col-md-6">
                            <label>கணவன் இறப்பு சான்றிதழ்</label>
                            <input required class="form-control" type="file"
                            name="husband_death_certificate">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>சட்டப்பூர்வ வாரிசு சான்றிதழ்</label>
                            <input required class="form-control" type="file"
                            name="legal_heir_certificate">

                        </div>
                        <div class="mb-3 col-md-6">
                            <label>வருமானச் சான்றிதழ்</label>
                            <input required class="form-control" type="file"
                            name="income_certificate">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>முகவரி ஆதாரம்</label>
                            <input required class="form-control" type="file"
                            name="anyothers_certificate">
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
    var dist_id = "{{ $customers->dist_id }}";
    var taluk_id = "{{ $customers->taluk_id }}";
    var wallet = "{{ Auth::user()->wallet }}";
    var amount = "{{ $payment }}";
$(function() {
    if (parseFloat(amount) > parseInt(wallet)) {
        $('#save').prop("disabled", true);
        $('#nopayment').html("No Fund in Wallet.Please Update Your wallet To Continue the Service").css({
                        'color': 'red',
                        'font-size': '150%',
                        'font-weight': 'bold'
                    });
    }
gettaluk(dist_id);
getpanchayath(taluk_id);
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
                    $("#taluk").val("{{ $customers->taluk_id }}");

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
                    $("#panchayath").val("{{ $customers->panchayath_id }}");

            }
        });
    }

    $('#incomeyearly').on('input',function() {
        var yearly = parseInt($('#incomeyearly').val());
        $('#incomemonthly').val((yearly / 12 ? yearly / 12 : 0).toFixed(2));
    });
    var customerid = "{{ $customers->id }}";
    $('#can_details').change(function(){
        if($('#can_details').val() == 'Yes') {
            $('#cannumberhide').show("slow");
            $('#cannumber').prop("required",true);
            $('#dobhide').hide("slow");
        }else if($('#can_details').val() == 'No'){
            $('#dobhide').show("slow");
            $('#cannumberhide').hide("slow");
            $('#cannumber').prop("required",false);
        }else if($('#can_details').val() == 'Find'){
            $('#dobhide').hide("slow");
            $('#cannumberhide').show("slow");
            $('#cannumber').prop("required",false);
            window.location.href = "{{ url('applyservices') }}/"+121;
        } else {
            $('#dobhide').hide("slow");
            $('#cannumberhide').hide("slow");
            $('#cannumber').prop("required",false);
        }
    });

    $('#age_proof').change(function(){
        if($('#age_proof').val() == 'Tc/Community Certificate') {
             $('#tc_community_certificatehide').show("slow");
             $('#marksheethide').hide("slow");
             $('#voteridhide').hide("slow");
             $('#birth_certificatehide').hide("slow");
             $('#driving_licensehide').hide("slow");
             $('#marksheet').prop("required","false");
            $('#voterid').prop("required","false");
            $('#birth_certificate').prop("required","false");
            $('#driving_license').prop("required","false");
            $('#tc_community_certificate').prop("required","true");

        } else if($('#age_proof').val() == 'Marksheet') {
            $('#marksheethide').show("slow");
            $('#tc_community_certificatehide').hide("slow");
             $('#voteridhide').hide("slow");
             $('#birth_certificatehide').hide("slow");
             $('#driving_licensehide').hide("slow");
             $('#tc_community_certificate').prop("required","false");
            $('#voterid').prop("required","false");
            $('#birth_certificate').prop("required","false");
            $('#driving_license').prop("required","false");
            $('#marksheet').prop("required","true");

        } else if($('#age_proof').val() == 'Voter Id') {
            $('#voteridhide').show("slow");
            $('#marksheethide').hide("slow");
            $('#tc_community_certificatehide').hide("slow");
            $('#birth_certificatehide').hide("slow");
            $('#driving_licensehide').hide("slow");
            $('#tc_community_certificate').prop("required","false");
            $('#marksheet').prop("required","false");
            $('#birth_certificate').prop("required","false");
            $('#driving_license').prop("required","false");
            $('#voterid').prop("required","true");

        } else if($('#age_proof').val() == 'Birth Certificate') {
            $('#birth_certificatehide').show("slow");
            $('#marksheethide').hide("slow");
            $('#tc_community_certificatehide').hide("slow");
            $('#voteridhide').hide("slow");
            $('#driving_licensehide').hide("slow");
            $('#tc_community_certificate').prop("required","false");
            $('#marksheet').prop("required","false");
            $('#voterid').prop("required","false");
            $('#driving_license').prop("required","false");
            $('#birth_certificate').prop("required","true");

        } else if($('#age_proof').val() == 'Licence') {
            $('#driving_licensehide').show("slow");
            $('#marksheethide').hide("slow");
            $('#tc_community_certificatehide').hide("slow");
            $('#voteridhide').hide("slow");
            $('#birth_certificatehide').hide("slow");
            $('#tc_community_certificate').prop("required","false");
            $('#marksheet').prop("required","false");
            $('#voterid').prop("required","false");
            $('#birth_certificate').prop("required","false");
            $('#driving_license').prop("required","true");

        } else{
            $('#voteridhide').hide("slow");
            $('#marksheethide').hide("slow");
            $('#tc_community_certificatehide').hide("slow");
            $('#birth_certificatehide').hide("slow");
            $('#driving_licensehide').hide("slow");
            $('#tc_community_certificate').prop("required",false);
            $('#marksheet').prop("required",false);
            $('#voterid').prop("required",false);
            $('#birth_certificate').prop("required",false);
            $('#driving_license').prop("required",false);

        }
    });
    $('#other_certificate').change(function(){
        if($('#other_certificate').val() == 'Passport') {
             $('#pass_porthide').show("slow");
             $('#pan_cardhide').hide("slow");
             $('#voter_idhide').hide("slow");
             $('#driving_licensehide').hide("slow");
             $('#pan_card').prop("required",false);
            $('#voter_id').prop("required",false);
            $('#drivinglicense').prop("required",false);
            $('#pass_port').prop("required",true);

        } else if($('#other_certificate').val() == 'PAN Card') {
            $('#pan_cardhide').show("slow");
            $('#pass_porthide').hide("slow");
             $('#voter_idhide').hide("slow");
             $('#driving_licensehide').hide("slow");
             $('#pass_port').prop("required",false);
            $('#voter_id').prop("required",false);
            $('#drivinglicense').prop("required",false);
            $('#pan_card').prop("required",true);

        } else if($('#other_certificate').val() == 'Voter Id') {
            $('#voteridhide').show("slow");
            $('#pass_porthide').hide("slow");
            $('#pan_cardhide').hide("slow");
            $('#driving_licensehide').hide("slow");
            $('#pass_port').prop("required",false);
            $('#drivinglicense').prop("required",false);
            $('#pan_card').prop("required",false);
            $('#voter_id').prop("required",true);

        } else if($('#other_certificate').val() == 'Driving License') {
            $('#driving_licensehide').show("slow");
            $('#pass_porthide').hide("slow");
            $('#pan_cardhide').hide("slow");
            $('#voteridhide').hide("slow");
            $('#pass_port').prop("required",false);
            $('#voter_id').prop("required",false);
            $('#pan_card').prop("required",false);
            $('#drivinglicense').prop("required",true);
        } else{
            $('#driving_licensehide').hide("slow");
            $('#pass_porthide').hide("slow");
            $('#pan_cardhide').hide("slow");
            $('#voteridhide').hide("slow");
            $('#pass_port').prop("required",false);
            $('#pan_card').prop("required",false);
            $('#voter_id').prop("required",false);
            $('#drivinglicense').prop("required",false);

        }
    });


    </script>
@endpush
