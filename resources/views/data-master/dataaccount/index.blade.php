@extends('layouts.main')

@section('content')
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Data Account</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page"></li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <div class="row">
                    <div class="col-sm-12 col-lg-6 col-md-12 col-xl-4">
                        <div class="card">
                            <div class="row">
                                <div class="col-4">
                                    <div class="circle-icon bg-primary text-center align-self-center box-primary-shadow"
                                        style="height: 60px;">
                                        <i class="lnr lnr-user fs-30 text-white mt-4"></i>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="card-body p-4">
                                        <h5 class="mb-2 fw-normal mt-2 text-muted">DETAIL INFORMATION</h5>
                                        <h6 class="mb-0 fw-bold">Data Currency</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6 col-md-12 col-xl-8">
                        <div class="float-end">
                            <a href="#" class="btn btn-primary btn-icon text-white me-2" data-bs-toggle="modal"
                                data-bs-target="#newDataModal">
                                <span>
                                    <i class="fe fe-arrow-down"></i>
                                </span>
                                New Data
                            </a>

                            <div class="modal fade" id="newDataModal" tabindex="-1" aria-labelledby="newDataModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content rounded-modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title text-primary" id="newDataModalLabel">Add New Account
                                            </h4>
                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body" style="min-height: 500px;">
                                            <form action="{{ route('dataaccount.store') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="code" class="form-label">Kode</label>
                                                    <input type="text" class="form-control" id="code" name="code"
                                                        placeholder="Fill the text" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Akun</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        placeholder="Fill the text" required>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white text-primary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-secondary text-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-body pb-0">
                                <table id="myDataTable" class="display table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Code</td>
                                            <td>Name</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- CONTAINER END -->
        </div>
    </div>
    <!--app-content end-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#myDataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('dataaccount.getData') }}',
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + 1; // Adding 1 to start the iteration from 1
                        }
                    },
                    {
                        data: 'code',
                        name: 'code',
                        order: false
                    },
                    {
                        data: 'name',
                        name: 'name',
                        order: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        order: false
                    },
                ],
                "columnDefs": [{
                    "width": "5%",
                    "targets": 0
                }]
            });
        });
    </script>
@endpush
