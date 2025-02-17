@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
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
                    <h2 class="card-title">Courses</h2>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Course Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($viewcourse as $key => $p)
                                    <tr class="text-white">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $p->name }}</td>
                                        <td><img src="/upload/course_image/{{ $p->ser_image }}" class="rounded-circle"
                                                width="40" height="40" alt=""></td>
                                        <td> <a class="btn btn-sm btn-danger text-white"><i
                                                    class='bx bx-btn'></i>{{ $p->status }}</a>

                                            <button onclick="edit_course('{{ $p->id }}','{{ $p->name }}')"
                                                type="button" class="btn-sm btn btn-primary">Edit</button>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-body">
            <div class="modal fade" id="editcor">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title align-self-center" id="exampleModalform1">Update Course</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mt-1">
                            <div class="form-body">
                                <form class="modal-content" action="{{ url('/updatecourse') }}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="row">
                                            <input type="hidden" name="corid" id="corid">
                                            <div class="col mb-3">
                                                <label for="name" class="form-label">Course
                                                    Name</label>
                                                <input type="text" id="editservice" name="name" class="form-control"
                                                    placeholder="Name" />
                                            </div>
                                            <div class="col mb-3">
                                                <label for="ser_image" class="form-label">
                                                    Image</label>
                                                <input type="file" name="ser_image" class="form-control"
                                                    maxlength="5" />
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('page_scripts')
        <script>
            function edit_course(id, name) {
                $("#editservice").val(name);
                $("#corid").val(id);
                $("#editcor").modal("show");
            }

            function editstatus(id, status) {
                $("#editsta").val(status);
                $("#pan_id").val(id);
                $("#editsta").modal("show");
            }
        </script>
    @endpush
