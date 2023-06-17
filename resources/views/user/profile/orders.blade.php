@extends('user.master')

@section('user.content')
@include('user.nav')
<div class="container">

    <div class="col-md-2" style=" height:auto; margin-top: 50px;">
        <div class="" style=" border: 1px red;">
            <h5>Hey, {{Auth::user()->name}}</h5>
            <div style="" class="btn-group-vertical pf">
            <a style=" " href="{{url('/billing-address')}}" class="btn"> Billing Address <img style="width: 20px;"  src="./img/home-address.png" alt=""></a>
            <a style="  " href="{{url('/view-cart')}}" class="btn">Your Cart <img style="width: 20px;"  src="./img/shopping-cart.png" alt=""></a>
            <a style=" " href="" class=" btn ">Your Wishlist <img style="width: 20px;"  src="./img/wishlist.png" alt=""></a>
            <a style=" " href="{{url('/all-orders')}}" class=" btn ">Your Order <img style="width: 20px;"  src="./img/shopping-bag.png" alt=""></a>
            </div>

        </div>
    </div>
<div class="col-md-10">
    <table class="table table-striped" style="margin-top: 10px;">
        <thead>
          <tr>

            <th scope="col">Order id</th>
            <th scope="col">Product name</th>
            <th scope="col">Size</th>
            <th scope="col">Color</th>
            <th scope="col">Qty</th>
            <th scope="col">Total Price</th>
            <th scope="col">Delivery Status</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($orderlists  as $orderlist)
            @php
            $orderlist['image'] = explode('|',$orderlist->image);
            $images = $orderlist->image[0];
            @endphp

          <tr>
            <th scope="row">{{$orderlist->id}}</th>
            <td>{{$orderlist->product_name}}</td>
            <td>{{$orderlist->size}}</td>
            <td>{{$orderlist->color}}</td>
            <td>{{$orderlist->qty}}</td>
            <td>{{$orderlist->total_price}}</td>
            {{-- <td>{{$orderlist->delivery_status}}</td> --}}
            <td>
                @if($orderlist->delivery_status == 'Synced')
                <h5>Order Confirm</h5>
                @elseif($orderlist->delivery_status == 'Cancel by user')
                <h5>Order Cancel</h5>
                @else
                {{$orderlist->delivery_status}}
                @endif
            </td>
            <td>
                <img src="{{asset('/image/'.$images)}}" style="width:100px; height:100px;">
            </td>
            <td>
                @if($orderlist->delivery_status == 'processing')
                <a href="{{url('/order-cancel/'.$orderlist->id)}}" onclick=" confirmation(event)" class="btn btn-danger">Cancel Order</a>
                @else
                <h5>Nothing to action</h5>
                @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    </div>
@endsection
<style>
    .pf  a {
    box-shadow: inset 0 0 0 0 #f75c76;
    color: Black;

    padding: 0 .15rem;
    transition: color .10s ease-in-out, box-shadow .3s ease-in-out;
    margin-top: 10px;
    padding: 10px;
    width: 100%;
  }
  .pf  a:hover {
    box-shadow: inset 200px 0 0 0 #f75c76;
    color: white;
  }

  </style>
