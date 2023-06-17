@extends('admin.master')
@section('admin.content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">All Products</h4>

                <div class="table-responsive">
                    <table class="table table-striped" id="example1">
                        <thead>
                            <tr>

                                <th style="width: 5%;">ID</th>
                                <th style="width: 10%;">Product name</th>
                                <th style="width: 10%;">Category</th>
                                <th style="width: 10%;">Size</th>
                                <th style="width: 10%;">Color</th>
                                <th style="width: 10%;">Price</th>
                                <th style="width: 10%;">Discount Price</th>
                                <th style="width: 25%;">Description</th>
                                <th style="width: 15%;">Image</th>
                                <th style="width: 5%;">Status</th>
                                <th style="width: 5%;">Hot deal</th>
                                <th style="width: 10%;">Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                @php
                                    $product['image'] = explode('|', $product->image);
                                @endphp
                                <tr>
                                    <td class="py-1">
                                        {{ $product->id }}
                                    </td>
                                    <td>
                                        {{ $product->name }}
                                    </td>
                                    <td>
                                        {{ $product->category }}
                                    </td>
                                    <td>
                                        {{ $product->size }}
                                    </td>
                                    <td>
                                        {{ $product->color }}
                                    </td>
                                    <td> {{ $product->price }}</td>
                                    <td> {{ $product->discount_price }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        @foreach ($product->image as $images)
                                            <img src="{{ asset('/image/' . $images) }}" style="width: 80px;height:80px ;">
                                        @endforeach
                                    </td>
                                    <td class="center">
                                        {{-- @if ($product->status == 1)
                          <span class="btn btn-success">Active</span>
                        @else
                        <span class="btn btn-danger">Deactive</span>
                        @endif --}}

                                        <label class="switch">
                                            <input class="switch_change" name="status" id="{{ $product->id }}"
                                                value="{{ $product->status }}" data-onstyle="info" type="checkbox"
                                                @php if ($product->status == 1) echo "checked"; @endphp>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="switch">
                                            <input class="deal" name="hotdeals" id="{{ $product->id }}"
                                                value="{{ $product->hot_deal }}" data-onstyle="info" type="checkbox"
                                                @php if ($product->hot_deal == 1) echo "checked"; @endphp>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="p-2">
                                                <a href="{{ url('/edit-product/' . $product->id) }}"
                                                    class=" btn btn-info btn-sm"> <i class="las la-edit"></i></a>
                                            </div>
                                            <div class="p-2">
                                                <form action="{{ url('/delete-product/' . $product->id) }}" method="post">
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
@push('js')
    <script>
        $(document).ready(function() {
            $("#example").DataTable()
        });
        $('.switch_change').on('change', function(e) {
            e.preventDefault();
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).attr('id');

            $.ajax({

                url: '{{ url('/tog-stts') }}',
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    status: status,
                    id: id
                },

                success: function(data) {

                    toastr.success(data.message);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#example").DataTable()
        });
        $('.deal').on('change', function(e) {
            e.preventDefault();
            var deal = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).attr('id');

            $.ajax({

                url: '{{ url('/tog-deals') }}',
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    hotdeals: deal,
                    id: id
                },

                success: function(data) {

                    toastr.success(data.message);
                }
            });
        });
    </script>
@endpush
