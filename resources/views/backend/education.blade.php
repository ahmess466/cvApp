@extends('backend.dashboard')

@section('main')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong class="card-title">Education Details</strong>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" method="POST" action="{{ route('save.education') }}" novalidate>
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="eduName">University/School/Institute</label>
                                        <input type="text" name="eduName" id="eduName" class="form-control" placeholder="Enter ..." required>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-8 mb-3">
                                            <label for="StartDate">Start Date</label>
                                            <input type="date" name="StartDate" class="form-control" id="StartDate" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="EndDate">End Date</label>
                                            <input type="date" name="EndDate" class="form-control" id="EndDate">
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="level_id">Select Level of Education</label>
                                        <select class="form-control" id="level_id" name="level_id" required>
                                            @foreach ($kinds as $kind)
                                                <option value="{{ $kind->id }}">{{ $kind->levelName }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="field">Field/Position</label>
                                        <input type="text" name="field" id="field" class="form-control" placeholder="Enter ...">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="desc">Describe What You Have Got</label>
                                        <textarea class="form-control" id="desc" rows="4" name="desc"></textarea>
                                    </div>

                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{route('user.language')}}" class="btn btn-danger">Next</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
