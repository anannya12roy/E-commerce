@extends('admin.master')
@section('admin.content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Create Size</h4>
        <p class="card-description">
            Please fill out the form below.
        </p>
    
        <form action="{{url('/store-size')}}" method="POST" class="forms-sample">
            @csrf
          <div class="form-group">
            <label for="">Size Name </label>
            <input type="text" class="form-control" name="name" data-role="tagsinput" placeholder="Size Name" >
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
 
          <button type="submit" class="btn btn-primary me-2">Submit</button>
         
        </form>
      </div>
    </div>
  </div>
@endsection