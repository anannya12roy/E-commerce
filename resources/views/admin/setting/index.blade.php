@extends('admin.master')
@section('admin.content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Settings</h4><br>
                <form class="forms-sample" action="{{url('/update-setting')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for=""><b>Phone No :</b></label>
                        <input type="text" class="form-control" name="phn" value="{{ $setting['phn'] }}"  placeholder="Write The Phone Number">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Email :</b></label>
                        <input type="text" class="form-control" name="email" value="{{ $setting['email'] }}"  placeholder="Write The Email">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Location :</b></label>
                        <input type="text" class="form-control" name="location" value="{{ $setting['location'] }}"  placeholder="Write The Location">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Description :</b></label>
                        <input type="text" class="form-control" name="description" value="{{ $setting['description'] }}"  placeholder="Write The Description">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Facebook Link :</b></label>
                        <input type="text" class="form-control" name="facebook_link" value="{{ $setting['facebook_link'] }}"  placeholder="Write The Facebook Link">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Twitter Link :</b></label>
                        <input type="text" class="form-control" name="twitter_link" value="{{ $setting['twitter_link'] }}"  placeholder="Write The Twitter Link ">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Instagram Link :</b></label>
                        <input type="text" class="form-control" name="instagram_link" value="{{ $setting['instagram_link'] }}"  placeholder="Write The Instagram Link">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Youtube Link :</b></label>
                        <input type="text" class="form-control" name="youtube_link" value="{{ $setting['youtube_link'] }}"  placeholder="Write The Youtube Link">
                    </div>
                    <button type="submit" class="btn btn-info me-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
