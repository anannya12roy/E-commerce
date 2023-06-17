{{-- @extends('user.master')

@section('user.content')
    <br>
    <br>
    <br>
    <br>
    <div class="sidebar">
        <a class="active" href="#home">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
    </div>
@endsection

<style>
    body {
        margin: 0;
        font-family: "Lato", sans-serif;
    }

    .sidebar {
        margin: 0;
        padding: 0;
        width: 200px;
        background-color: white;
        position: fixed;
        height: 30%;
        overflow: auto;
    }

    .sidebar a {
        display: block;
        color: black;
        padding: 16px;
        text-decoration: none;
    }

    .sidebar a.active {
        background-color: #04AA6D;
        color: white;
    }

    .sidebar a:hover:not(.active) {
        background-color: #555;
        color: white;
    }

    div.content {
        margin-left: 200px;
        padding: 1px 16px;
        height: 1000px;
    }

    @media screen and (max-width: 700px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }
        .sidebar a {float: left;}
        div.content {margin-left: 0;}
    }

    @media screen and (max-width: 400px) {
        .sidebar a {
            text-align: center;
            float: none;
        }
    }
</style> --}}
@extends('user.master')

@section('user.content')

<div class="container" style="">
        <div style="text-align:center;">
            <h5 style="margin-top:2%;">Manage Profile Information</h5>
            <h6 style="color:rgb(0, 0, 0); font-size:14px;">Update your account's profile information.</h6>
        </div>
        <div class="col-md-3" style=" height:auto; margin-top: 50px;">
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
        <div class="col-md-9" style="border:1px solid rgb(185, 184, 184); padding:40px; border-radius:5px;">
            <form action="{{url('/profile-update')}}" method="post" class="form-inline">
                @csrf
                <div class="form-group">
                    <label style="font-weight: 500; font-size:medium;" for="exampleInputName2">Name</label><br>
                    <input size="96" style="border:1px solid black; width:100%; border-radius:5px;" name="name" type="text" class="form-control" id="exampleInputName2" value="{{Auth::user()->name}}" placeholder="Jane Doe">
                </div>

                <div class="form-group ">
                    <label style="font-weight: 500; font-size:medium;" for="exampleInputEmail2">Phone</label><br>
                    <input size="45" style="border:1px solid black; width:100%; border-radius:5px;" name="phone" type="text" class="form-control" id="exampleInputEmail2" value="{{Auth::user()->phone}}" placeholder="jane.doe@example.com">
                </div>

                <div class="form-group ">
                    <label style="font-weight: 500; font-size:medium;" for="exampleInputEmail2">Email</label><br>
                    <input size="45" style="border:1px solid black; width:100%; border-radius:5px;" name="email" type="email" class="form-control" id="exampleInputEmail2" value="{{Auth::user()->email}}"placeholder="jane.doe@example.com">
                </div>

                {{-- <div class="form-inline">
                    <label style="font-weight: 500; font-size:medium;" for="exampleInputName2">Address</label><br>
                    <textarea style="border:1px solid black; border-radius:5px; width:100%;"  name="address" id=""  cols="3" rows="5">{{Auth::user()->name}}</textarea>
                </div> --}}

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
