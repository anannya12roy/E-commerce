@extends('admin.master')
@section('admin.content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Create Category</h4>
        <p class="card-description">
            Please fill out the form below.
        </p>
    
        <form action="{{url('store-category')}}" method="POST" class="forms-sample">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name" >
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
 
          <div class="form-group">
            <label for="exampleTextarea1">Description</label>
            <textarea class="form-control" name="description" id="exampleTextarea1" rows="4" ></textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary me-2">Submit</button>
         
        </form>
      </div>
    </div>
  </div>
@endsection