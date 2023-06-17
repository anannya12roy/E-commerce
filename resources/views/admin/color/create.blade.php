@extends('admin.master')
@section('admin.content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Create Color</h4><br>

                <form class="forms-sample" action="{{ url('/store-color') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for=""><b>Color :</b></label>
                        <input type="text" class="form-control" name="color" placeholder="Write The Color">
                    </div>
                    <div class="form-group">
                        <label><b>Image :</b></label>
                        <input name="image" type="file" class="form-control">
                        @error('file')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <button type="submit" class="btn btn-info me-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
