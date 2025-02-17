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
                        <h5 class="card-title">Apply Service</h5>
                        <div class="row">
                            <form class="row g-4" action="#" enctype="multipart/form-data"
                                method="post">
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <input type="hidden" id="customerid" name="customerid" value="{{ $customerid }}">
                                        <label for="input1" class="form-label">Service</label>
                                        <div class="col-sm-10">
                                            <select id="serviceid" class="form-select">
                                                <option value="">Select</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->service_name }}
                                                    </option>
                                                @endforeach
                                            </select>
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


        $('#serviceid').on('change', function() {
            var serviceid = this.value;
            var customerid =  $("#customerid").val();
                window.location.href = "{{ url('applyservice') }}/"+serviceid+"/"+customerid;

        });
    </script>
@endpush
