@extends('admin.master')
@section('admin.content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">All Category</h4>
        
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr class="p-3 mb-2 bg-success text-white">
                <th>ID</th>
                <th>Subscriber Email</th>
                <th>Action</th>
                
              </tr>
            </thead>
            <tbody>
            @foreach ($subscribes as $key=>$subscribe)
              <tr>
                    <td class="py-1">
                        {{$key+1}}
                    </td>
                    <td>
                        {{$subscribe->email}}
                    </td>
                    <td>
                        <div class="d-flex">
                            <div class="p-2">   
                                <form action="{{url('/delete_subscribe/'.$subscribe->id)}}" method="post">
                                    @csrf
                                    <button class=" btn btn-danger btn-sm">  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                      </svg></button>
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