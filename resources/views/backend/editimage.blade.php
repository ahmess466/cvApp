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
                                <strong class="card-title">User Image </strong>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" enctype="multipart/form-data" method="POST" action="{{ route('update.image') }}" novalidate>
                                    @csrf
                                    <input type="hidden" name="id" value="{{$image->id}}">
                                    <input type="hidden" name="Old_img" value="{{$image->image}}">


                                    <div class="form-group mb-3">
                                        @if(isset($image->image))
                                            <img src="{{ asset($image->image) }}" style="width: 200px; height: 200px;" alt="User Image">
                                        @endif
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="example-fileinput">Cv Image</label>
                                        <input type="file" name="image" id="example-fileinput" class="form-control-file">
                                    </div>

                                    <button class="btn btn-primary" type="submit">Save</button>
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
