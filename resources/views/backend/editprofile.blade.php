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
                  <strong class="card-title">Edit Profile</strong>
                  <p>Short Description About Yourself</p>
                </div>
                <div class="card-body">
                  <form class="needs-validation" method="POST" action="{{route('update.profile')}}" novalidate>
                    @csrf
                    <input type="hidden" name="id" value="{{$profile->id}}>
                    <div class="form-group mb-3">
                        <label for="example-textarea">Text Area</label>
                        <textarea class="form-control"  id="example-textarea"  rows="4" name="desc">{{$profile->desc}}</textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Edit</button>
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
