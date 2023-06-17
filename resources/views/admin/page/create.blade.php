@extends('admin.master')
@section('admin.content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Create Hotdeal Banner</h4><br>

        <form class="forms-sample" action="{{url('/store-page')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for=""><b>Title :</b></label>
                <input type="text" class="form-control" name="title"  placeholder="Write The Title">
            </div>
            <div class="form-group">
                <label for=""><b>Slug :</b></label>
                <input type="text" class="form-control" name="slug"  placeholder="Write The Slug">
            </div>
            <div class="form-group">
                <label for=""><b>First Description :</b></label>
                <input type="text" class="form-control" name="frst_desp"  placeholder="Write The First Description">
            </div>
            <div class="form-group">
                <label for=""><b>Second Description :</b></label>
                <textarea id="editor" type="text" class="form-control" name="scnd_desp"  placeholder="Write The Second Description"></textarea>
            </div>


        <button type="submit" class="btn btn-info me-2">Submit</button>

        </form>
      </div>
    </div>
  </div>
  @endsection
