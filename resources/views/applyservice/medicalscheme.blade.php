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
                            <form class="row g-4" action="{{ url('submitapply_medicalscheme') }}" enctype="multipart/form-data"
                                method="post">
                                @csrf
                               <div class="row">
                        <input type="hidden" name="serviceid" value="{{ $serviceid }}">
                        <input type="hidden" name="amount" value="{{ $amount }}">
                        <input type="hidden" name="service_amount" value="{{ $payment }}">
                        <input type="hidden" name="user_id" value="{{ $customers->id }}">
                        <div class="row">
                           @if($serviceid == 179)
                          <div class="mb-3 col-md-6">
                            <label for="family_head_name" class="form-label">Family Head Name</label>
                            <input required type="text" class="form-control"
                            name="family_head_name" maxlength="30" placeholder="Family Head Name"/>
                        </div>
                        <div class="mb-3 col-md-6">
                           <label for="mobile" class="form-label">Cell Number </label>
                            <input required type="text" class="form-control number"
                            name="mobile" maxlength="10" placeholder="Cell Number "/>
                        </div>                          
                        <div class="mb-3 col-md-6">
                            <label for="family_head_photo" class="form-label">Family Head Photo</label>
                            <input required accept="image/jpeg, image/png"  type="file" class="form-control"
                            name="family_head_photo" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="smartcard_onlineprint" class="form-label">Smart card (Online print)</label>
                            <input required accept="image/jpeg, image/png"  type="file" class="form-control"
                            name="smartcard_onlineprint" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="allfamily_mem_aadhaarcard" class="form-label">All family Members Adhaar card</label>
                            <input required accept="image/jpeg, image/png"  type="file" class="form-control"
                            name="allfamily_mem_aadhaarcard" />
                        </div>
                        @elseif ($serviceid == 180) 
                        <div class="mb-3 col-md-6">
                            <label for="mobile" class="form-label">Adhaar link cell Number</label>
                             <input required type="text" class="form-control number"
                             name="mobile" maxlength="10" placeholder="Adhaar link cell Number"/>
                         </div> 
                         <div class="mb-3 col-md-6">
                            <label for="aadhaar_card" class="form-label">Adhaar Card (Front & Back)</label>
                            <input required type="file"  class="form-control"
                            name="aadhaar_card" placeholder="Adhaar card (Front & Back)" />
                         </div>

                        @endif
                    </div>
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

    $('#property_details').change(function(){
        if($('#property_details').val() == 'Personal Strap') {
            $('#personal_straphide').show("slow"); 
            $('#personal_strap').prop("required", true);
            $('#joint_straphide').hide("slow");
            $('#joint_strap').prop("required", false);  
        } else if($('#property_details').val() == 'Joint Strap') {
            $('#joint_straphide').show("slow");
            $('#joint_strap').prop("required", true); 
            $('#personal_strap').prop("required", false); 
            $('#personal_straphide').hide("slow");  
        }else{
            $('#personal_straphide').hide("slow");
            $('#personal_strap').prop("required", false); 
            $('#joint_strap').prop("required", false); 
            $('#joint_straphide').hide("slow");
        } 
    });

    $('#deed_details').change(function(){
        if($('#deed_details').val() == 'Yes') {
            $('#deedhide').show("slow"); 
            $('#deed').prop("required", true);  
        }else{
            $('#deedhide').hide("slow");
            $('#deed').prop("required", false); 
        } 
    });
    </script>
@endpush
