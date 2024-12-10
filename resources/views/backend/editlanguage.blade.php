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
                  <strong class="card-title">Personal languages</strong>
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

                  <form class="needs-validation" method="POST" action="{{route('update.language')}}" novalidate>
                    @csrf
                    <input type="hidden" name="id" value="{{ $language->id }}">

                    <div class="form-group mb-3">
                      <label for="language-placeholder">languages</label>
                      <input type="text" name="languageName" id="language-placeholder" class="form-control" data-role="tagsinput"
                        placeholder="Enter your languages" value="{{ $language->languageName ?? '' }}">
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
