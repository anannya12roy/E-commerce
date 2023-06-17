@extends('admin.master')
@section('admin.content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Create Hotdeal Banner</h4><br>

        <form class="forms-sample" action="{{url('/store-hot_deal')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for=""><b>First Description :</b></label>
                <input type="text" class="form-control" name="frst_desp"  placeholder="Write The First Description">
            </div>
            <div class="form-group">
                <label for=""><b>Second Description :</b></label>
                <input type="text" class="form-control" name="scnd_desp"  placeholder="Write The Second Description">
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