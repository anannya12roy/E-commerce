@include('sweetalert::alert')
<header>

    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i>{{ $setting['phn'] }}</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i>{{ $setting['email'] }}</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i>{{ $setting['location'] }}</a></li>
            </ul>
            <ul class="header-links pull-right">

                @if (Route::has('login'))
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li><a href="{{url('profile')}}"><i
                                        class="fa fa-user"></i>Profile</a></li>
                            <li><a href="route('logout')"
                                    onclick="event.preventDefault();
                                this.closest('form').submit();"><i
                                        class="fa fa-user-o"></i> Logout</a></li>

{{--                            <i class="bi bi-person-circle"></i>--}}
                        </form>
                    @else
                        <li><a href="{{ route('login') }}"><i class="fa fa-user-o"></i> Login</a></li>
                        <li><a href="{{ route('register') }}"><i class="fa fa-user-o"></i> Registration</a></li>

                    @endauth
                @endif
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ asset('user/img/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                <option value="0">All Categories</option>
                                <option value="1">Category 01</option>
                                <option value="1">Category 02</option>
                            </select>
                            <input class="input" placeholder="Search here">
                            <button class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                @if (Route::has('login'))
                    @auth

                        <div class="col-md-3 clearfix">
                            <div class="header-ctn">


                                <!-- Wishlist -->
                                <div>
                                    <a href="#">
                                        <i class="fa fa-heart-o"></i>
                                        <span>Your Wishlist</span>
                                        <div class="qty">2</div>
                                    </a>
                                </div>
                                <!-- /Wishlist -->

                                <!-- Cart -->
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Your Cart</span>
                                            <?php
                                            $totalitem = 0;
                                            ?>
                                        @foreach ($carts as $cart)
                                                <?php
                                                $totalitem =$totalitem +  $cart->quantity;
                                                ?>
                                        @endforeach
                                        <div class="qty">{{$totalitem}}</div>
                                    </a>
                                    <div class="cart-dropdown">


                                        @foreach ($carts as $cart)
                                            <div class="cart-list">

                                                <div class="product-widget">
                                                    <div class="product-img">
                                                        <img src="{{ asset('/image/' . $cart->image) }}" alt="">
                                                    </div>
                                                    <div class="product-body">
                                                        <h3 class="product-name"><a
                                                                href="{{ url('/product-details/' . $cart->product_id) }}">{{ $cart->product_name }}</a></h3>
                                                        <h4 class="product-price"><span
                                                                class="qty">{{ $cart->quantity }}</span>Tk.{{ $cart->price }}
                                                        </h4>
                                                    </div>
                                                    <div>
                                                        {{-- <form action="{{ url('/delete_cart/' . $cart->id) }}" method="post">
                                                            @csrf
                                                            <button class="delete" onclick=" confirmation(event)"><i class="fa fa-close"></i></button>
                                                        </form> --}}
                                                        <a href="{{url('/delete_cart/'.$cart->id)}}" onclick=" confirmation(event)" style="height:25%; margin-left: 15px;  border-style: none;"  class="delete"><i  class="fa fa-close"></i></a>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                                <?php
                                                $totalitem = 0;
                                                $total_cart_price = 0;
                                                ?>
                                            @foreach ($carts as $cart)
                                                    <?php
                                                    $totalitem =$totalitem +  $cart->quantity;
                                                    $total_cart_price = $total_cart_price + $cart->total_price;
                                                    ?>
                                            @endforeach
                                        <div class="cart-summary">
                                            <small><b>Total Product : {{$totalitem}}</b></small>
                                            <h5>SUBTOTAL: ${{ $total_cart_price}}</h5>
                                        </div>
                                        <div class="cart-btns">
                                            <a href="{{url('/view-cart')}}">View Cart</a>
                                            <a href="{{url('/shipping-address')}}">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- /Cart -->

                                <!-- Menu Toogle -->
                                <div class="menu-toggle">
                                    <a href="#">
                                        <i class="fa fa-bars"></i>
                                        <span>Menu</span>
                                    </a>
                                </div>
                                <!-- /Menu Toogle -->
                            </div>
                        </div>
                    @endauth
                @endif
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
