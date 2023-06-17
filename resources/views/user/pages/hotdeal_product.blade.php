@extends('user.master')

@section('user.content')
    @include('user.nav')
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Categories</h3>
                        <div class="checkbox-filter">
                            @foreach ($categories as $category)
                                <div class="input-checkbox">
                                    <input type="checkbox" id="category-1">
                                    <label for="category-1">
                                        <span></span>
                                        {{ $category->name }}
                                        <small>(120)</small>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /aside Widget -->




                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Top selling</h3>
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="./img/product01.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            </div>
                        </div>

                        <div class="product-widget">
                            <div class="product-img">
                                <img src="./img/product02.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            </div>
                        </div>

                        <div class="product-widget">
                            <div class="product-img">
                                <img src="./img/product03.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            </div>
                        </div>
                    </div>
                    <!-- /aside Widget -->
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="store-sort">
                            <label>
                                Sort By:
                                <select class="input-select">
                                    <option value="0">Popular</option>
                                    <option value="1">Position</option>
                                </select>
                            </label>

                            <label>
                                Show:
                                <select class="input-select">
                                    <option value="0">20</option>
                                    <option value="1">50</option>
                                </select>
                            </label>
                        </div>
                        <ul class="store-grid">
                            <li class="active"><i class="fa fa-th"></i></li>
                            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row">
                        @foreach ($hotdealshops as $product)
                            <!-- product -->
                            <div class="col-md-4 col-xs-6">
                                <a href="{{ url('productbycat', $product->id) }}"></a>
                                <div class="product">
                                    <form action="{{ url('/add_cart/' . $product->id) }}" method="post">
                                        @csrf
                                        {{--									<div class="product-img"> --}}
                                        {{--										<img src={{ asset('image/'.$product->image) }};  alt=""> --}}
                                        {{--									</div> --}}
                                        <div class="product-body">
                                            <div class="product-img">
                                                <img name="image" style="height: 150px; width: 100px"
                                                    src="{{ asset('/image/' . $product->image) }}">
                                                {{--  <img name="image" style="height: 150px; width: 100px" src={{ asset('image/'.$product->image) }}  alt="">  --}}
                                            </div>
                                            <h3 class="product-name" name="name"><a
                                                    href="#">{{ $product->name }}</a></h3>

                                            @if ($product->discount_price)
                                                <p class="product-price" name="price"><b>
                                                        &#2547;{{ $product->discount_price }}</b> <del
                                                        class="product-old-price">&#2547;{{ $product->price }}</del></p>
                                            @else
                                                <p class="product-price" name="price"><b>
                                                        &#2547; {{ $product->price }}</b>
                                            @endif

                                            </p>
                                            <div class="product-btns">
                                                <button name="wishlist" class="add-to-wishlist"><i
                                                        class="fa fa-heart-o"></i><span class="tooltipp">add to
                                                        wishlist</span></button>
                                                {{--  <button name="compare" class="add-to-compare"><i
                                                        class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>  --}}
                                                <button name="quickview" class="quick-view"><i class="fa fa-eye"></i><span
                                                        class="tooltipp">quickview</span></button>
                                                <button name="" class="add-to-cart-btn"><a
                                                        class="fa fa-shopping-cart"
                                                        href="{{ url('/product-details/' . $product->id) }}"></a>
                                                    <span class="tooltipp">Add to Cart</span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <!-- /product -->
                        @endforeach

                    </div>
                    <!-- /store products -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <span class="store-qty">Showing 20-100 products</span>
                        <ul class="store-pagination">
                            <li class="active">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
@endsection
