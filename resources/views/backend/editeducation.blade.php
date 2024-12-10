@extends('backend.dashboard')

@section('main')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">Edit Education Details</h2>

                    <div class="row my-4">
                        <!-- Small table -->
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <!-- table -->
                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>#</th>
                                                <th>Name Of University/School/Institute</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Education</th>
                                                <th>Field/Position</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($educations as $kay => $education)
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $kay + 1 }}</td>
                                                <td>{{ $education->eduName }}</td>
                                                <td>{{ $education->StartDate }}</td>
                                                <td>{{ $education->EndDate }}</td>
                                                <td>{{ $education->education->levelName }}</td>
                                                <td>{{ $education->field }}</td> <!-- Fixed the unclosed tag -->
                                                <td>{{ $education->desc }}</td>
                                                <td>
                                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{ route('education.edit', $education->id) }}">Edit</a>
                                                        <a class="dropdown-item" id="delete" href="{{ route('education.delete', $education->id) }}">Remove</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- simple table -->
                    </div> <!-- end section -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </main> <!-- main -->
@endsection