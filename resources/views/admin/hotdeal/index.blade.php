@extends('admin.master')
@section('admin.content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Show Hotdeal Banner</h4>
        
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>SI NO</th>
                <th>Image</th>
                <th>First Desription</th>
                <th>Second Description</th>
                <th>Action</th>
                
              </tr>
            </thead>
            <tbody>
             
        @foreach($hotdeal as $key=>$hot)
              <tr>
                    <td class="py-1">
                        {{$key+1}}
                    </td>
                    <td>
                      <img width="50px" height="40px" src= "{{ asset('images/hotdeal'.'/'.$hot->image) }}">
                    </td>
                    <td>
                    <div class="">
                        {{$hot->frst_desp}}
                    </div>
                    </td>
                    <td>
                      <div class="">
                          {{$hot->scnd_desp}}
                      </div>
                      </td>
                    <td>
                        <div class="d-flex">
                            <div class="p-2">
                                <a href="{{url('/edit-hot_deal/'.$hot->id)}}" class=" btn btn-info btn-sm">  <i class="las la-edit"></i></a>
                            </div> 
                            <div class="p-2">   
                                <form action="{{url('/delete-hot_deal/'.$hot->id)}}" method="post">
                                    @csrf
                                    <button class=" btn btn-danger btn-sm">  <i class="las la-trash-alt" style="color:rgb(243, 243, 243);"></i></button>
                                </form>
                            </div>
                        </div>   
                    </td>
               
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endsection