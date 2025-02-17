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
                    <div class="row">
                        <form class="row g-4" action="{{ url('submit_statusupdate_tnegaservices3') }}" enctype="multipart/form-data"
                        method="post">
                        @csrf
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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3 row">
                                    <label for="example-text-input-lg" class="col-sm-3 form-label">Do You Have Can Number</label>
                                    <div class="col-sm-6">
                                        <select @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif  required name="can_details" id="can_details" class="form-control">
                                            <option value="">Select Can Details</option>
                                            <option @if($services->can_details == "Yes") selected @endif value="Yes">Yes</option>
                                            <option @if($services->can_details == "No") selected @endif value="No">No</option>
                                            <option @if($services->can_details == "Find") selected @endif value="Find">Find Can</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row" id="cannumberhide" style="display: none;">
                                    <label for="example-text-input-lg" class="col-sm-3 form-label">Can
                                    Number</label>
                                    <div class="col-sm-6">
                                        <input @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif  class="form-control" id="cannumber" type="text"
                                        name="can_number" value="{{ $services->can_number }}" maxlength="15">
                                    </div>
                                </div>
                                                  <div class="mb-3">

                                        <div class="row" id="dobhide" style="display: none;">
                                            <h4 class="text-center">Can Details</h4>
                                <div class="mb-3 col-md-4">
                                        <label style="color:#23e156" for="personalized" class="form-label">திரு/திருமதி/செல்வி</label>
                                        <select @if (Auth::user()->id != $apply_user_id ) disabled @endif class="form-control"
                                            name="personalized">
                                            <option value="">Select</option>
                                            <option @if ($services->personalized == 'திரு') selected @endif value="திரு">திரு.
                                            </option>
                                            <option @if ($services->personalized == 'திருமதி') selected @endif value="திருமதி">திருமதி.
                                            </option>
                                            <option @if ($services->personalized == 'செல்வி') selected @endif value="செல்வி">
                                                செல்வி.</option>
                                        </select>

                                        <label style="color:#23e156" for="relationship_1" class="form-label">உறவுமுறை</label>
                                        <select @if (Auth::user()->id != $apply_user_id ) disabled @endif class="form-control"
                                            name="relationship_1">
                                            <option value="">Select</option>
                                            <option @if ($services->relationship_1 == 'தந்தை') selected @endif value="தந்தை">தந்தை.
                                            </option>
                                        </select>
                                        <label style="color:#23e156" for="relationship_2" class="form-label">உறவுமுறை</label>
                                        <select @if (Auth::user()->id != $apply_user_id ) disabled @endif class="form-control"
                                            name="relationship_2">
                                            <option value="">Select</option>
                                            <option @if ($services->relationship_2 == 'தாய்') selected @endif value="தாய்">தாய்.
                                            </option>
                                        </select>
                                        <label style="color:#23e156" for="relationship_3" class="form-label">உறவுமுறை</label>
                                        <select @if (Auth::user()->id != $apply_user_id ) disabled @endif class="form-control"
                                            name="relationship_3">
                                            <option value="">Select</option>
                                            <option @if ($services->relationship_3 == 'கணவர்') selected @endif value="கணவர்">கணவர்.
                                            </option>
                                            <option @if ($services->relationship_3 == 'மனைவி') selected @endif value="மனைவி">மனைவி.
                                            </option>
                                            <option @if ($services->relationship_3 == 'உறவினர்') selected @endif value="உறவினர்">உறவினர்.
                                            </option>
                                        </select>
                                        <label style="color:#e411dd" for="community" class="form-label">Community</label>
                                            <select @if (Auth::user()->id != $apply_user_id ) disabled @endif class="form-control"
                                                name="community">
                                                <option value="">Select Community</option>
                                                <option @if ($services->community == 'BC') selected @endif value="BC">BC.
                                                </option>
                                                <option @if ($services->community == 'OC') selected @endif value="OC">OC.
                                                </option>
                                                <option @if ($services->community == 'OBC') selected @endif value="OBC">OBC.
                                                </option>
                                                <option @if ($services->community == 'MBC') selected @endif value="MBC">MBC.
                                                </option>
                                                <option @if ($services->community == 'SC') selected @endif value="SC">SC.
                                                </option>
                                                <option @if ($services->community == 'ST') selected @endif value="ST">ST.
                                                </option>
                                                <option @if ($services->community == 'BC(Muslim)') selected @endif value="BC(Muslim)">BC (Muslim).
                                                </option>
                                            </select>
                                            <label style="color:#23e156" for="maritial_status" class="form-label">Maritial Status</label>
                                                <select @if (Auth::user()->id != $apply_user_id ) disabled @endif class="form-control"
                                                    name="maritial_status">
                                                    <option value="">Select Maritial Status</option>
                                                    <option @if ($services->maritial_status == 'Married') selected @endif value="Married">Married
                                                    </option>
                                                    <option @if ($services->maritial_status == 'Single') selected @endif value="Single">Single
                                                    </option>
                                                    <option @if ($services->maritial_status == 'Divorced') selected @endif value="Divorced">Divorced
                                                    </option>
                                                </select>


                                        <label style="color:#23e156" for="door_no" class="form-label">Door No</label>
                                        <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="text"
                                            value="{{ $services->door_no }}" class="form-control" name="door_no"
                                            maxlength="20" placeholder="Door No" />
                                            <label style="color:#23e156" for="pin_code" class="form-label">Pin Code</label>
                                            <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="text"
                                                value="{{ $services->pin_code }}" class="form-control" name="pin_code"
                                                maxlength="10" placeholder="Pin Code" />
                                    </div>
                                    <div class="mb-3 col-md-4">

                                        <label style="color:#e411dd" for="personalized_name_tamil" class="form-label">பெயர் தமிழில்</label>
                                        <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="text"
                                            value="{{ $services->personalized_name_tamil }}" class="form-control" name="personalized_name_tamil"
                                            maxlength="50" placeholder="பெயர் தமிழில்" />
                                        <label style="color:#e411dd" for="relationship_name_tamil_1" class="form-label">பெயர் தமிழில்</label>
                                        <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="text"
                                            value="{{ $services->relationship_name_tamil_1 }}" class="form-control" name="relationship_name_tamil_1"
                                            maxlength="50" placeholder="பெயர் தமிழில்" />
                                            <label style="color:#e411dd" for="relationship_name_tamil_2" class="form-label">பெயர் தமிழில்</label>
                                        <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="text"
                                            value="{{ $services->relationship_name_tamil_2 }}" class="form-control" name="relationship_name_tamil_2"
                                            maxlength="50" placeholder="பெயர் தமிழில்" />
                                            <label style="color:#e411dd" for="relationship_name_tamil_3" class="form-label">பெயர் தமிழில்</label>
                                        <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="text"
                                            value="{{ $services->relationship_name_tamil_3 }}" class="form-control" name="relationship_name_tamil_3"
                                            maxlength="50" placeholder="பெயர் தமிழில்" />
                                         <label style="color:#23e156" for="caste" class="form-label">Caste</label>
                                            <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="text"
                                                value="{{ $services->caste }}" class="form-control" name="caste"
                                                maxlength="20" placeholder="caste" />
                                                <label style="color:#23e156" for="education" class="form-label">Education</label>
                                        <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="text"
                                            value="{{ $services->education }}" class="form-control" name="education"
                                            maxlength="50" placeholder="Education" />

                                        <label style="color:#e411dd" for="street_name_tamil" class="form-label">தெரு பெயர்</label>
                                            <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="text"
                                                value="{{ $services->street_name_tamil }}" class="form-control" name="street_name_tamil"
                                                maxlength="50" placeholder="தெரு பெயர்" />
                                        <label style="color:#e411dd" for="street_name_tamil" class="form-label">அஞ்சல் பெயர்</label>
                                            <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="text"
                                                value="{{ $services->street_name_tamil }}" class="form-control" name="street_name_tamil"
                                                maxlength="50" placeholder="அஞ்சல் பெயர்" />
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label style="color:#23e156" for="personalized_name_english" class="form-label">Name In English</label>
                                            <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="text"
                                                value="{{ $services->personalized_name_english }}" class="form-control" name="personalized_name_english"
                                                maxlength="50" placeholder="Name In English" />
                                                <label style="color:#23e156" for="relationship_name_english_1" class="form-label">Name In English</label>
                                            <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text"
                                                value="{{ $services->relationship_name_english_1 }}" class="form-control" name="relationship_name_english_1"
                                                maxlength="50" placeholder="Name In English" />
                                                <label style="color:#23e156" for="relationship_name_english_2" class="form-label">Name In English</label>
                                            <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text"
                                                value="{{ $services->relationship_name_english_2 }}" class="form-control" name="relationship_name_english_2"
                                                maxlength="50" placeholder="Name In English" />
                                                <label style="color:#23e156" for="relationship_name_english_3" class="form-label">Name In English</label>
                                            <input @if (Auth::user()->id != $apply_user_id) disabled @endif required type="text"
                                                value="{{ $services->relationship_name_english_3 }}" class="form-control" name="relationship_name_english_3"
                                                maxlength="50" placeholder="Name In English" />

                                           <label style="color:#23e156" for="religion" class="form-label">Religion</label>
                                        <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="text"
                                            value="{{ $services->religion }}" class="form-control" name="religion"
                                            maxlength="20" placeholder="Religion" />

                                        <label style="color:#23e156" for="work" class="form-label">Work</label>
                                        <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="text"
                                            value="{{ $services->work }}" class="form-control" name="work"
                                            maxlength="50" placeholder="Work" />

                                        <label style="color:#23e156" for="street_name" class="form-label">Street Name</label>
                                            <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="text"
                                                value="{{ $services->street_name }}" class="form-control" name="street_name"
                                                maxlength="30" placeholder="Street Name" />

                                        <label style="color:#23e156" for="village_administrative_area" class="form-label">Postal Area</label>
                                        <input @if (Auth::user()->id != $apply_user_id ) disabled @endif required type="text"
                                        value="{{ $services->village_administrative_area }}" class="form-control" name="village_administrative_area"
                                        maxlength="20" placeholder="Postal Area" />

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
                                <label for="panchayath_name" class="form-label">VAO</label>
                                <input value="{{ $customers->panchayath_name }}" required type="text" class="form-control" name="panchayath_name" placeholder="VAO"/>

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




                        @if($serviceid == 27)

                        <div class="mb-3 col-md-6">
                            @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                            @if ($services->husband_death_certificate != '')
                            <label>கணவர் இறப்பு சான்றிதழ்</label>
                            <br><a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/husband_death_certificate/{{ $services->husband_death_certificate }}"
                            class="btn btn-primary me-2">View</a><br>
                            @endif
                            @else
                            <label>கணவர் இறப்பு சான்றிதழ்</label>
                            <input @if ($services->husband_death_certificate == '') required @endif class="form-control"
                            type="file" accept="image/jpeg, image/png" name="husband_death_certificate">
                            @if ($services->husband_death_certificate != '')
                            <a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/husband_death_certificate/{{ $services->husband_death_certificate }}">Download</a><br>
                            @endif
                            @endif

                        @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                            @if ($services->widow_certificate != '')
                            <label>விதவை சான்றிதழ்</label>
                            <br><a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/widow_certificate/{{ $services->widow_certificate }}"
                            class="btn btn-primary me-2">View</a><br>
                            @endif
                            @else
                            <label>விதவை சான்றிதழ்</label>
                            <input @if ($services->widow_certificate == '') required @endif class="form-control"
                            type="file" accept="image/jpeg, image/png" name="widow_certificate">
                            @if ($services->widow_certificate != '')
                            <a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/widow_certificate/{{ $services->widow_certificate }}">Download</a><br>
                            @endif
                            @endif

                        </div>
                        <div class="mb-3 col-md-6">
                            @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                            @if ($services->widow_certificate != '')
                            <label>விதவை சான்றிதழ்</label>
                            <br><a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/widow_certificate/{{ $services->widow_certificate }}"
                            class="btn btn-primary me-2">View</a><br>
                            @endif
                            @else
                            <label>விதவை சான்றிதழ்</label>
                            <input @if ($services->widow_certificate == '') required @endif class="form-control"
                            type="file" accept="image/jpeg, image/png" name="widow_certificate">
                            @if ($services->widow_certificate != '')
                            <a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/widow_certificate/{{ $services->widow_certificate }}">Download</a><br>
                            @endif
                            @endif

                            @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                            @if ($services->bank_pass_book != '')
                            <label>வங்கி பாஸ்புக்</label>
                            <br><a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/bank_pass_book/{{ $services->bank_pass_book }}"
                            class="btn btn-primary me-2">View</a><br>
                            @endif
                            @else
                            <label>வங்கி பாஸ்புக்</label>
                            <input @if ($services->bank_pass_book == '') required @endif class="form-control"
                            type="file" accept="image/jpeg, image/png" name="bank_pass_book">
                            @if ($services->bank_pass_book != '')
                            <a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/bank_pass_book/{{ $services->bank_pass_book }}">Download</a><br>
                            @endif
                            @endif

                        <label>ஏதேனும் ஐடி ஆதாரம்</label>
                        <select @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required class="form-control required" id="id_proof" name="id_proof"  style="width: 100%;">
                            <option value="">Select Id Proof</option>

                            <option @if($services->any_proof == "Passport") selected @endif value="Passport">Passport</option>
                            <option @if($services->any_proof == "PAN Card") selected @endif value="PAN Card">PAN Card</option>
                            <option @if($services->any_proof == "Voter Id") selected @endif value="Voter Id">Voter Id</option>
                            <option @if($services->any_proof == "Driving License") selected @endif value="Driving License">Driving License</option>
                        </select>

                        <div class="" id="passporthide" style="display: none;">
                            @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                            @if ($services->passport != '')
                            <label>பாஸ்போர்ட்</label>
                            <br><a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/passport/{{ $services->passport }}"
                            class="btn btn-primary me-2">View</a><br>
                            @endif
                            @else
                            <label>பாஸ்போர்ட்</label>
                            <input @if ($services->passport == '' && $services->any_proof == 'Passport') required @endif class="form-control" id="passport"
                            type="file" accept="image/jpeg, image/png" name="passport">
                            @if ($services->passport != '')
                            <a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/passport/{{ $services->passport }}">Download</a><br>
                            @endif
                            @endif

                        </div>
                        <div class="" id="pancardhide" style="display: none;">
                            @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                            @if ($services->pancard != '')
                            <label>PAN கார்டு</label>
                            <br><a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/pancard/{{ $services->pancard }}"
                            class="btn btn-primary me-2">View</a><br>
                            @endif
                            @else
                            <label>PAN கார்டு</label>
                            <input @if ($services->pancard == '' && $services->any_proof == 'Pan Card') required @endif class="form-control" id="pancard"
                            type="file" accept="image/jpeg, image/png" name="pancard">
                            @if ($services->pancard != '')
                            <a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/pancard/{{ $services->pancard }}">Download</a><br>
                            @endif
                            @endif
                        </div>
                        <div class="" id="voteridhide" style="display: none;">
                            @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                            @if ($services->voterid != '')
                            <label>வாக்காளர் ஐடி</label>
                            <br><a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/voterid/{{ $services->voterid }}"
                            class="btn btn-primary me-2">View</a><br>
                            @endif
                            @else
                            <label>வாக்காளர் ஐடி</label>
                            <input @if ($services->voterid == '' && $services->any_proof == 'Voter Id') required @endif class="form-control" id="voterid"
                            type="file" accept="image/jpeg, image/png" name="voterid">
                            @if ($services->voterid != '')
                            <a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/voterid/{{ $services->voterid }}">Download</a><br>
                            @endif
                            @endif
                        </div>
                        <div class="" id="driving_licensehide" style="display: none;">
                            @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                            @if ($services->driving_license != '')
                            <label>ஓட்டுநர் உரிமம்</label>
                            <br><a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/driving_license/{{ $services->driving_license }}"
                            class="btn btn-primary me-2">View</a><br>
                            @endif
                            @else
                            <label>ஓட்டுநர் உரிமம்</label>
                            <input @if ($services->driving_license == '' && $services->any_proof == 'Driving License') required @endif class="form-control" id="driving_license"
                            type="file" accept="image/jpeg, image/png" name="driving_license">
                            @if ($services->driving_license != '')
                            <a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/driving_license/{{ $services->driving_license }}">Download</a><br>
                            @endif
                            @endif
                        </div>
                    </div>
                   @elseif($serviceid == 28)
                    <div class="mb-3 col-md-6">

                    @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                            @if ($services->husband_death_certificate != '')
                            <label>கணவன் இறப்பு சான்றிதழ்</label>
                            <br><a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/husband_death_certificate/{{ $services->husband_death_certificate }}"
                            class="btn btn-primary me-2">View</a><br>
                            @endif
                            @else
                            <label>கணவன் இறப்பு சான்றிதழ்</label>
                            <input @if ($services->husband_death_certificate == '') required @endif class="form-control"
                            type="file" accept="image/jpeg, image/png" name="husband_death_certificate">
                            @if ($services->husband_death_certificate != '')
                            <a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/husband_death_certificate/{{ $services->husband_death_certificate }}">Download</a><br>
                            @endif
                            @endif
                    </div>
                    <div class="mb-3 col-md-6">
                   <label>திருமணச் சான்றிதழ்</label>
                    <select @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id) disabled @endif required class="form-control " id="m_certificate" name="mrg_docdetails"  style="width: 100%;">
                        <option value="">Select Certificate</option>

                        <option @if($services->mrg_docdetails == "Marriage Invitation") selected @endif value="Marriage Invitation">திருமண பத்திரிக்கை</option>
                        <option @if($services->mrg_docdetails == "Marriage Registration Certificate") selected @endif value="Marriage Registration Certificate">திருமண பதிவு சான்று</option>
                        <option @if($services->mrg_docdetails == "Marriage Documents") selected @endif value="Marriage Documents">திருமணத்தை உறுதி செய்ய ஏதேனும் ஒரு ஆவணம்</option>
                    </select>

                    <div class="" id="mrg_invitationhide" style="display: none;">
                        @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                            @if ($services->mrg_invitation != '')
                            <label>திருமண பத்திரிக்கை</label>
                            <br><a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/mrg_invitation/{{ $services->mrg_invitation }}"
                            class="btn btn-primary me-2">View</a><br>
                            @endif
                            @else
                            <label>திருமண பத்திரிக்கை</label>
                            <input @if ($services->mrg_invitation == '' && $services->mrg_docdetails == 'Marriage Invitation') required @endif class="form-control" id="mrg_invitation"
                            type="file" accept="image/jpeg, image/png" name="mrg_invitation">
                            @if ($services->mrg_invitation != '')
                            <a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/mrg_invitation/{{ $services->mrg_invitation }}">Download</a><br>
                            @endif
                            @endif

                    </div>
                    <div class="" id="mrg_registration_certificatehide" style="display: none;">
                         @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                        @if ($services->mrg_registration_certificate != '')
                            <label>திருமண பதிவு சான்று</label>
                            <br><a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/mrg_registration_certificate/{{ $services->mrg_registration_certificate }}"
                            class="btn btn-primary me-2">View</a><br>
                            @endif
                            @else
                            <label>திருமண பதிவு சான்று</label>
                            <input @if ($services->mrg_registration_certificate == '' && $services->mrg_docdetails == 'Marriage Registration Certificate') required @endif class="form-control" id="mrg_registration_certificate"
                            type="file" accept="image/jpeg, image/png" name="mrg_registration_certificate">
                            @if ($services->mrg_registration_certificate != '')
                            <a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/mrg_registration_certificate/{{ $services->mrg_registration_certificate }}">Download</a><br>
                            @endif
                            @endif

                    </div>
                    <div class="" id="mrg_documentshide" style="display: none;">
                         @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                        @if ($services->mrg_documents != '')
                            <label>திருமணத்தை உறுதி செய்ய ஏதேனும் ஒரு ஆவணம்</label>
                            <br><a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/mrg_documents/{{ $services->mrg_documents }}"
                            class="btn btn-primary me-2">View</a><br>
                            @endif
                            @else
                            <label>திருமணத்தை உறுதி செய்ய ஏதேனும் ஒரு ஆவணம்</label>
                            <input @if ($services->mrg_documents == '' && $services->mrg_docdetails == 'Marriage Documents') required @endif class="form-control" id="mrg_documents"
                            type="file" accept="image/jpeg, image/png" name="mrg_documents">
                            @if ($services->mrg_documents != '')
                            <a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/mrg_documents/{{ $services->mrg_documents }}">Download</a><br>
                            @endif
                            @endif
                    </div>
                    </div>

                    @elseif($serviceid == 129)
                    <div class="mb-3 col-md-6">
                        @if (Auth::user()->id != $apply_user_id && Auth::user()->id != $services->user_id)
                            @if ($services->tc_community_certificate != '')
                            <label>Transfer Certificate(TC)</label>
                            <br><a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/tc_community_certificate/{{ $services->tc_community_certificate }}"
                            class="btn btn-primary me-2">View</a><br>
                            @endif
                            @else
                            <label>Transfer Certificate(TC)</label>
                            <input @if ($services->tc_community_certificate == '') required @endif class="form-control"
                            type="file" accept="image/jpeg, image/png" name="tc_community_certificate">
                            @if ($services->tc_community_certificate != '')
                            <a target="_blank"
                            href="{{ URL::to('/') }}/upload/services/tc_community_certificate/{{ $services->tc_community_certificate }}">Download</a><br>
                            @endif
                            @endif
                        </div>
                        <div class="mb-3 col-md-6"></div>
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
     $(function() {
        gettaluk(dist_id);
        getpanchayath(taluk_id);

        var status = "{{ $services->status }}";
        var acknowledgement = "{{ $services->acknowledgement }}";
        var certificate = "{{ $services->certificate }}";
        var candetails = "{{ $services->can_details }}";
        var anyproof = "{{ $services->any_proof }}";
        var marriagedoc = "{{ $services->mrg_docdetails }}";
        if(anyproof == "Passport"){
           $('#passporthide').show("slow");
         }else if(anyproof == "PAN Card"){
            $('#pancardhide').show("slow");
         }else if(anyproof == "Voter Id"){
            $('#voteridhide').show("slow");
         }else if(anyproof == "Driving License"){
             $('#driving_licensehide').show("slow");
         }

         if(marriagedoc == "Marriage Invitation"){
             $('#mrg_invitationhide').show("slow");
         }else if(marriagedoc == "Marriage Registration Certificate"){
             $('#mrg_registration_certificatehide').show("slow");
         }else if(marriagedoc == "Marriage Documents"){
             $('#mrg_documentshide').show("slow");
         }

         if(candetails == "Yes"){
            $('#cannumberhide').show("slow");
            $('#cannumber').prop("required",true);
        }else if(candetails == "No"){
            $('#dobhide').show("slow");
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


    var customerid = "{{ $customers->id }}";
    $('#can_details').change(function(){
        if($('#can_details').val() == 'Yes') {
            $('#cannumberhide').show("slow");
            $('#cannumber').prop("required",true);
        }else if($('#can_details').val() == 'No'){
            window.location.href = "{{ url('applyservice') }}/"+60+"/"+customerid;
        }else if($('#can_details').val() == 'Find'){
            window.location.href = "{{ url('applyservice') }}/"+121+"/"+customerid;
        } else {
            $('#cannumberhide').hide("slow");
            $('#cannumber').prop("required",false);
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

    $('#id_proof').change(function(){
        if($('#id_proof').val() == 'Passport') {
             $('#passporthide').show("slow");
             $('#pancardhide').hide("slow");
             $('#voteridhide').hide("slow");
             $('#driving_licensehide').hide("slow");
             $('#pandcard').prop("required",false);
            $('#voterid').prop("required",false);
            $('#driving_license').prop("required",false);
            $('#passport').prop("required",true);

        } else if($('#id_proof').val() == 'PAN Card') {
            $('#pancardhide').show("slow");
            $('#passporthide').hide("slow");
             $('#voteridhide').hide("slow");
             $('#driving_licensehide').hide("slow");
             $('#passport').prop("required",false);
            $('#voterid').prop("required",false);
            $('#driving_license').prop("required",false);
            $('#pancard').prop("required",true);

        } else if($('#id_proof').val() == 'Voter Id') {
            $('#voteridhide').show("slow");
            $('#passporthide').hide("slow");
            $('#pancardhide').hide("slow");
            $('#driving_licensehide').hide("slow");
             $('#passport').prop("required",false);
            $('#driving_license').prop("required",false);
            $('#pancard').prop("required",false);
            $('#voterid').prop("required",true);

        } else if($('#id_proof').val() == 'Driving License') {
            $('#driving_licensehide').show("slow");
            $('#passporthide').hide("slow");
            $('#pancardhide').hide("slow");
            $('#voteridhide').hide("slow");
             $('#passport').prop("required",false);
            $('#voterid').prop("required",false);
            $('#pancard').prop("required",false);
            $('#driving_license').prop("required",true);
        } else{
            $('#driving_licensehide').hide("slow");
            $('#passporthide').hide("slow");
            $('#pancardhide').hide("slow");
            $('#voteridhide').hide("slow");
            $('#passport').prop("required",false);
            $('#pancard').prop("required",false);
            $('#voterid').prop("required",false);
            $('#driving_license').prop("required",false);

        }
    });

    $('#m_certificate').change(function(){
        if($('#m_certificate').val() == 'Marriage Invitation') {
             $('#mrg_invitationhide').show("slow");
             $('#mrg_registration_certificatehide').hide("slow");
             $('#mrg_documentshide').hide("slow");
             $('#mrg_registration_certificate').prop("required",false);
            $('#mrg_documents').prop("required",false);
            $('#mrg_invitation').prop("required",true);

        } else if($('#m_certificate').val() == 'Marriage Registration Certificate') {
            $('#mrg_registration_certificatehide').show("slow");
            $('#mrg_invitationhide').hide("slow");
            $('#mrg_documentshide').hide("slow");
            $('#mrg_invitation').prop("required",false);
            $('#mrg_documents').prop("required",false);
            $('#mrg_registration_certificate').prop("required",true);

        } else if($('#m_certificate').val() == 'Marriage Documents') {
            $('#mrg_documentshide').show("slow");
            $('#mrg_registration_certificatehide').hide("slow");
            $('#mrg_invitationhide').hide("slow");
            $('#mrg_invitation').prop("required",false);
            $('#mrg_registration_certificate').prop("required",false);
            $('#mrg_documents').prop("required",true);

        } else{
            $('#mrg_invitationhide').hide("slow");
            $('#mrg_registration_certificatehide').hide("slow");
            $('#mrg_documentshide').hide("slow");
            $('#mrg_invitation').prop("required",false);
            $('#mrg_registration_certificate').prop("required",false);
            $('#mrg_documents').prop("required",false);

        }
    });


</script>
@endpush
