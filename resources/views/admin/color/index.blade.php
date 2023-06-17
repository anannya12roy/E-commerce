@extends('admin.master')
@section('admin.content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Show All Color</h4>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>SI NO</th>
                                <th>Color</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($colors as $key => $color)
                                <tr>
                                    <td class="py-1">
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        <div class="">
                                            {{ $color->color }}
                                        </div>
                                    </td>
                                    <td>
                                        <img width="50px" height="40px"
                                            src="{{ asset('images/color' . '/' . $color->image) }}">
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="p-2">
                                                <a href="{{ url('/edit-color/' . $color->id) }}"
                                                    class=" btn btn-info btn-sm"> <i class="las la-edit"></i></a>
                                            </div>
                                            <div class="p-2">
                                                <form action="{{ url('/delete-color/' . $color->id) }}" method="post">
                                                    @csrf
                                                    <button class=" btn btn-danger btn-sm"> <i class="las la-trash-alt"
                                                            style="color:rgb(243, 243, 243);"></i></button>
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
