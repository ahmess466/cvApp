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
                  <strong class="card-title">Personal Skills</strong>
                </div>
                <div class="card-body">

                  {{-- <!-- Display Validation Errors -->
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif --}}

                  <form class="needs-validation" method="POST" action="{{route('update.skill')}}" novalidate>
                    @csrf
                    <input type="hidden" name="id" value="{{ $skill->id }}">

                    <div class="form-group mb-3">
                      <label for="skill-placeholder">Skills</label>
                      <input type="text" name="skillName" id="skill-placeholder" class="form-control" data-role="tagsinput"
                        placeholder="Enter your Skills" value="{{ $skill->skillName ?? '' }}">
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
                  </form>
                </div> <!-- /.card-body -->
              </div> <!-- /.card -->
            </div> <!-- /.col -->
          </div> <!-- end section -->
        </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->

</main> <!-- main -->
@endsection
