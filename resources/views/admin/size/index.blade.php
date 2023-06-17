@extends('admin.master')
@section('admin.content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">All Size</h4>
        
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>

                <th style="width: 5%;" >ID</th>
                <th style="width: 20%;">Size name</th>
               
                <th style="width: 25%;">Action</th>
                
              </tr>
            </thead>
            <tbody>
            @foreach ($sizes as $size)
              <tr>
                    <td class="py-1">
                        {{$size->id}}
                    </td>
                    <td>
                        {{$size->name}}
                    </td>
                   
                    <td>
                        <div class="d-flex">
                            <div class="p-2">
                                <a href="{{url('/edit-size/'.$size->id)}}" class=" btn btn-info btn-sm">  <i class="las la-edit"></i></a>
                            </div> 
                            <div class="p-2">   
                                <form action="{{url('/delete-size/'.$size->id)}}" method="post">
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