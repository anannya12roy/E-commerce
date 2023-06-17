@extends('admin.master')
@section('admin.content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Edit Color</h4>

                <form action="{{ url('/update-color/' . $color->id) }}" method="POST" class="forms-sample"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1"><b>Color :</b></label>
                        <input type="text" class="form-control" name="color" value="{{ $color->color }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1"><b>Image :</b></label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1"><b>Old Image :</b?< /label>
                                <td>
                                    <img width="150px" height="100px" src="{{ asset('images/color' . '/' . $color->image) }}">
                                </td>
                    </div>
                    <button type="submit" class="btn btn-info me-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
