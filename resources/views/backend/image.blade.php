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
                                <form class="needs-validation" enctype="multipart/form-data" method="POST" action="{{route('save.image')}}" novalidate>
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="image">Cv Image</label>
                                        <input type="file" name="image" id="example-fileinput " class="form-control-file">
                                    </div>









                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{route('cv')}}" class="btn btn-danger">Next</a>
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
