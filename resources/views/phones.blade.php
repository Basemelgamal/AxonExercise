@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Phone Numbers</h1>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6 mb-3">
                        <select id="country_selection" class="form-control">
                            <option value="" disabled selected>---Select Country---</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <select id="valid_selection" class="form-control">
                            <option value="" disabled selected>---Valid Country Number---</option>
                            <option value="0">Valid</option>
                            <option value="1">Not valid</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="kt_datatable" class="table dt-responsive table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                            <thead>
                                <tr>
                                    <th class="sorting" tab index="1" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">#</th>
                                    <th class="sorting" tabindex="2" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Country</th>
                                    <th class="sorting" tabindex="2" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">State</th>
                                    <th class="sorting" tabindex="3" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Country Code</th>
                                    <th class="sorting" tabindex="2" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Phone num</th>
                                    {{--  <th class="sorting" tabindex="2" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Count</th>
                                    <th class="sorting" tabindex="2" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Salaries</th>
                                    <th class="sorting" tabindex="5" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Created At</th>  --}}
                                </tr>
                            </thead>
                            <tbody id="phone_numbers_table_rows">

                            </tbody>
                        </table>
                        <!-- Pagination Controls -->
                        <div id="pagination">
                            <button id="prevPage" onclick="prevPage()" class="btn btn-white">Previous</button>
                            <span class="col-1" id="currentPage">1</span>
                            <button id="nextPage" onclick="nextPage()" class="btn btn-white">Next</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>
<!-- /.col -->
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{ url('/assets/scripts.js') }}"></script>

