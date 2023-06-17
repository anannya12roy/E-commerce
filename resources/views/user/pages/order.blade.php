@extends('user.master')

@section('user.content')
    
<div class="container">
    <div class="col-md-3"></div>
    <div style=" margin-top:50px; margin-bottom:50px;" class="col-md-6   order-details">
        <div class="section-title text-center">
            <h3 class="title">Your Order</h3>
        </div>
        <div class="order-summary">
            <div class="order-col">
                <div><strong>PRODUCT</strong></div>
                <div><strong>TOTAL</strong></div>
            </div>
            <?php
            $total_cart_price = 0;
           $totalitem = 0;
           ?>
           @foreach ($carts as $cart)
           <?php

            $total_cart_price = $total_cart_price + $cart->total_price;
            ?>
            <div class="order-products">
                <div class="order-col">
                    <div>Qty {{$cart->quantity}} x {{$cart->product_name}} ({{$cart->color}} - {{$cart->size}} )</div>
                    <div>&#2547;{{$cart->total_price}}</div>
                </div>

            </div>
            @endforeach
            <div class="order-col">
                <div>Shipping</div>
                <div><strong>FREE</strong></div>
            </div>
            <div class="order-col">
                <div><strong>TOTAL</strong></div>
                <div><strong class="order-total">&#2547;{{ $total_cart_price }}</strong></div>
            </div>
        </div>
        <div class="payment-method">
            <div class="input-radio">
                <input type="radio" name="payment" id="payment-1">
                <label for="payment-1">
                    <span></span>
                    Cash On Delivery
                </label>
            </div>


        </div>
        <div class="input-checkbox">
            <input type="checkbox" id="terms">
            <label for="terms">
                <span></span>
                I've read and accept the <a href="#">terms & conditions</a>
            </label>
        </div>
        <a href="{{url('/cod-order')}}" class="primary-btn order-submit">Place order</a>
    </div>

</div>
<div class="col-md-3"></div>

@endsection
