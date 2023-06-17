@extends('user.master')

@section('user.content')
@include('user.nav')
<div class="container" style="">
        <div style="text-align:center;">
            <h5 style="margin-top:2%;">Manage Profile Information</h5>
            <h6 style="color:rgb(0, 0, 0); font-size:14px;">Update your account's profile information.</h6>
        </div>
        <div class="col-md-3" style=" height:auto; margin-top: 50px;">
            <div class="" style=" border: 1px red;">
                <h5>Hey, {{Auth::user()->name}}</h5>
                <div style="" class="btn-group-vertical pf">
                <a style=" " href="" class="btn"> Billing Address <img style="width: 20px;"  src="./img/home-address.png" alt=""></a>
                <a style="  " href="{{url('/view-cart')}}" class="btn">Your Cart <img style="width: 20px;"  src="./img/shopping-cart.png" alt=""></a>
                <a style=" " href="" class=" btn ">Your Wishlist <img style="width: 20px;"  src="./img/wishlist.png" alt=""></a>
                <a style=" " href="{{url('/all-orders')}}" class=" btn ">Your Order <img style="width: 20px;"  src="./img/shopping-bag.png" alt=""></a>
                </div>

            </div>
        </div>
        <div class="col-md-9" style="border:1px solid rgb(185, 184, 184); padding:40px; border-radius:5px;">
            <form action="{{url('/billing-address-update')}}" method="post" class="form-inline">
                @csrf

                <div class="form-group ">
                    <label style="font-weight: 500; font-size:medium;" for="exampleInputEmail2">Phone</label><br>
                    <input size="45" style="border:1px solid black; width:100%; border-radius:5px;" name="phone" type="text" class="form-control"  value="{{Auth::user()->phone}}" placeholder="phone number">
                </div>

                <div class="form-group ">
                    <label style="font-weight: 500; font-size:medium;" for="exampleInputEmail2">City</label><br>
                    <input size="45" style="border:1px solid black; width:100%; border-radius:5px;" name="city" type="text" class="form-control"  value="{{Auth::user()->city}}"placeholder="city">
                </div>

                <div class="form-group ">
                    <label style="font-weight: 500; font-size:medium;" for="exampleInputEmail2">District</label><br>
                    <input size="45" style="border:1px solid black; width:100%; border-radius:5px;" name="district" type="text" class="form-control" value="{{Auth::user()->district}}" placeholder="district">
                </div>

                <div class="form-group ">
                    <label style="font-weight: 500; font-size:medium;" for="exampleInputEmail2">Zip code</label><br>
                    <input size="45" style="border:1px solid black; width:100%; border-radius:5px;" name="zip" type="text" class="form-control" value="{{Auth::user()->zip_code}}"placeholder="zip code">
                </div>
                <div class="form-inline">
                    <label style="font-weight: 500; font-size:medium;" for="exampleInputName2">Address</label><br>
                    <textarea style="border:1px solid black; border-radius:5px; width:100%;"  name="address" id=""  cols="3" rows="5">{{Auth::user()->address}}</textarea>
                </div>

                <button style="background-color:#D10024;color: #FFF;font-weight: 700;border: none; margin-top: 10px;" type="submit" class="btn btn-default">Update</button>
            </form>
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
