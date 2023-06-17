@extends('admin.master')
@section('admin.content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Edit Category</h4>
        <p class="card-description">
            Please fill out the form below.
        </p>
    
        <form action="{{url('/update-category/'.$category->id)}}" method="POST" class="forms-sample">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" class="form-control" name="name"  value="{{$category->name}}" >
           
          </div>
 
          <div class="form-group">
            <label for="exampleTextarea1">Description</label>
            <textarea class="form-control" name="description"  rows="4" >{{$category->description}}</textarea>
           
          </div>
          <button type="submit" class="btn btn-primary me-2">Submit</button>
         
        </form>
      </div>
    </div>
  </div>
@endsection