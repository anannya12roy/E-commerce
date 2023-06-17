@extends('admin.master')
@section('admin.content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Edit Hotdeal Banner Details</h4>
        <form action="{{url('/update-page/'.$page->id)}}" method="POST" class="forms-sample" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputName1"><b>Title :</b></label>
                <input type="text" class="form-control" name="title" value="{{$page->title}}">
            </div>
            <div class="form-group">
                <label for="exampleInputName1"><b>Slug :</b></label>
                <input type="text" class="form-control" name="slug" value="{{$page->slug}}">
            </div>
            <div class="form-group">
            <label for="exampleInputName1"><b>First Description :</b></label>
            <input type="text" class="form-control" name="frst_desp" value="{{$page->frst_desp}}">
            </div>
            <div class="form-group">
                <label for="exampleInputName1"><b>Second Description :</b></label>
                <textarea type="text" id="editor" class="form-control" name="scnd_desp" value="">{{$page->scnd_desp}}</textarea>
            </div>
            <button type="submit" class="btn btn-info me-2">Submit</button>

        </form>
      </div>
    </div>
  </div>
@endsection
