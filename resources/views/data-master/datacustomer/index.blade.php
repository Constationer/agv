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
                        <h1 class="page-title">Data Customer</h1>
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
                                        <h6 class="mb-0 fw-bold">Data Customer</h6>
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
                                            <h4 class="modal-title text-primary" id="newDataModalLabel">Add New Customer
                                            </h4>
                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('datacustomer.store') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        placeholder="Fill the text" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Address</label>
                                                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Fill the text"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="Fill the text" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="telephone" class="form-label">No Handphone</label>
                                                    <input type="text" class="form-control" id="telephone"
                                                        name="telephone" placeholder="Fill the text" required>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="npwp_or_ktp" class="form-label">NPWP/KTP</label>
                                                            <input type="text" class="form-control" id="npwp_or_ktp"
                                                                name="npwp_or_ktp" placeholder="Fill the text" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="file" class="form-label">Upload Supporting
                                                                Documents</label>
                                                            <input type="file" class="form-control" id="file"
                                                                name="file" placeholder="Fill the text" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="financial-fields-container">
                                                    <div class="financial-fields">
                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-11">
                                                                    <label for="financialField1">Financial 1</label>
                                                                    <div class="input-group">
                                                                        <select class="custom-select financial-type-select"
                                                                            name="currencyField1" required>
                                                                            @foreach ($currencies as $row)
                                                                                <option value="{{ $row->initial }}">
                                                                                    {{ $row->initial }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <input type="text"
                                                                            class="form-control financial-field"
                                                                            name="financialField1" required>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="col-1 d-flex justify-content-end align-items-end">
                                                                    <button class="btn btn-danger remove-field"><i
                                                                            class="fe fe-trash"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-11">
                                                                    <label for="descriptionField1">Description</label>
                                                                    <textarea class="form-control" id="descriptionField1" name="descriptionField1" rows="3"
                                                                        placeholder="Fill the text"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn add-financial-field">
                                                    <span class="text-primary"><i class="ion-ios7-plus"></i></span><span
                                                        class="fw-bold">Add
                                                        Financial</span>
                                                </button>
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
                                            <td>Customer Name</td>
                                            <td>Account Code</td>
                                            <td>Type</td>
                                            <td>No Handphone</td>
                                            <td>Total Funding</td>
                                            <td></td>
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
                ajax: '{{ route('datacustomer.getData') }}',
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + 1; // Adding 1 to start the iteration from 1
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'type',
                        name: 'type'
                    },
                    {
                        data: 'telephone',
                        name: 'telephone'
                    },
                    {
                        data: 'funding',
                        name: 'funding'
                    },
                    {
                        data: null,
                        defaultContent: '<button class="details-control">+</button>' // Details control button
                    }
                ],
                // Enable child rows
                rowGroup: {
                    dataSrc: 'type' // Column to group by (change to your desired column)
                },
                order: [
                    [0, 'asc'] // Order by the 'type' column (change to your desired column)
                ]
            });

            // Add event listener for opening and closing details
            $('#myDataTable tbody').on('click', 'button.details-control', function() {
                var tr = $(this).closest('tr');
                var row = table.row(tr);

                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });
        });

        function format(data) {
            return '<div>Additional information for ' + data.name + '</div>';
        }
    </script>


    <script>
        $(document).ready(function() {
            // Add financial field
            $('.add-financial-field').click(function() {
                var fieldIndex = $('.financial-fields').length + 1;
                var newField = $('.financial-fields').first().clone();
                newField.find('input').attr('name', 'financialField' + fieldIndex).val('');
                newField.find('select').attr('name', 'currencyField' + fieldIndex).val('');
                newField.find('label:first').text('Financial ' + fieldIndex); // Update Financial label
                newField.find('textarea').attr('id', 'descriptionField' + fieldIndex).attr('name',
                    'descriptionField' + fieldIndex).val('');
                newField.appendTo('.financial-fields-container');
                newField.find('.remove-field').show(); // Show remove button for new field
            });

            // Remove financial field
            $(document).on('click', '.remove-field', function() {
                $(this).closest('.financial-fields').remove();
                updateFieldLabels();
            });

            // Update field labels after removal
            function updateFieldLabels() {
                $('.financial-fields').each(function(index) {
                    var fieldIndex = index + 1;
                    $(this).find('label:first').text('Financial ' + fieldIndex);
                    $(this).find('input').attr('name', 'financialField' + fieldIndex);
                    $(this).find('select').attr('name', 'currencyField' + fieldIndex);
                    $(this).find('textarea').attr('id', 'descriptionField' + fieldIndex).attr('name',
                        'descriptionField' + fieldIndex);
                });
            }
        });
    </script>
@endpush
