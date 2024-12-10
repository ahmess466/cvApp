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
                                <strong class="card-title">Edit Education Details</strong>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" method="POST" action="{{ route('update.education') }}" novalidate>
                                    @csrf
                                    <input type="hidden" value="{{$educations->id}}" name="id">
                                    <div class="form-group mb-3">
                                        <label for="eduName">University/School/Institute</label>
                                        <input type="text" value="{{$educations->eduName}}" name="eduName" id="eduName" class="form-control" placeholder="Enter ..." required>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-8 mb-3">
                                            <label for="StartDate">Start Date</label>
                                            <input type="date" name="StartDate" value="{{$educations->StartDate}}" class="form-control" id="StartDate" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="EndDate">End Date</label>
                                            <input type="date" name="EndDate" value="{{$educations->EndDate}}" class="form-control" id="EndDate">
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="level_id">Select Level of Education</label>
                                        <select class="form-control" id="level_id" name="level_id" required>
                                            @foreach ($kinds as $kind)
                                                <option value="{{ $kind->id }}" {{$kind->id == $educations->level_id ? 'selected' : ''}}>{{ $kind->levelName }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="field">Field/Position</label>
                                        <input type="text" name="field" value="{{$educations->field}}" id="field" class="form-control" placeholder="Enter ...">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="desc">Describe What You Have Got</label>
                                        <textarea class="form-control" id="desc" rows="4" name="desc">{{$educations->desc}}</textarea>
                                    </div>

                                    <button class="btn btn-primary" type="submit">Edit</button>
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
