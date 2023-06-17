@extends('user.master')

@section('user.content')
    @include('user.nav')

      <!-- inner page section -->

     <!-- end inner page section -->

          <!-- Form section -->
          <section class="why_section layout_padding">
            <div class="container">

               <div class="">
                  <div class="col col-lg-6 row row-lg-8">
                     <section class="inner_page_head">
                        <div class="container_fuild">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="full">
                                    <h3 style="margin-top: 19px;">Billing Address</h3>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>

                     <div class="full" >
                        <form action="" method="POST">
                            @csrf

                           <fieldset>
                            <input type="text" id="bill_name" value="{{Auth::user()->name}}" placeholder="Enter full name" name="name" required style="width: 95%;margin-bottom:5px;padding:10px 15px; border-radius: 15px; border:1px solid black;"/>
                            <input type="email" id="bill_email" value="{{Auth::user()->email}}"placeholder="Enter email address" name="email" required style="width: 95%;margin-bottom:5px;padding:10px 15px; border-radius: 15px; border:1px solid black;"/>
                            <input type="text"  id="bill_phone"value="{{Auth::user()->phone}}" placeholder="Enter phone number" name="phone" required style="width: 95%;margin-bottom:5px;padding:10px 15px; border-radius: 15px; border:1px solid black;" />
                            <input type="text"  id="bill_add" value="{{Auth::user()->phone}}"placeholder="Enter shipping address (House no.,Street,area)" name="address" required style="width: 95%;margin-bottom:5px;padding:10px 15px; border-radius: 15px; border:1px solid black;"/>
                            <input type="text" id="bill_city"value="{{Auth::user()->phone}}" placeholder="Enter city" name="city" required style="width: 95%;margin-bottom:5px;padding:10px 15px; border-radius: 15px; border:1px solid black;"/>
                            <input type="text" id="bill_district" value="{{Auth::user()->phone}}" placeholder="Enter district" name="district" required style="width: 95%;margin-bottom:5px;padding:10px 15px; border-radius: 15px; border:1px solid black;"/>
                            <input type="text" id="bill_zip"value="{{Auth::user()->phone}}" placeholder="Enter zip code" name="zip" required style="width: 95%;margin-bottom:5px;padding:10px 15px; border-radius: 15px; border:1px solid black;"/>
                       <div class="col-md-12 row">
                        <div class="">

                            <div class="" style="display:flex;">
                            <input  class="" type="checkbox" id="billtoship" style="height: 20px;width:20px; margin-right:5px;">
                            <label for="billtoship" style="margin-top: 5px"> Shipping address Same as Billing address
                            </label>
                         </div>

                        </div>

                        </div>
                           </fieldset>

                        </form>
                     </div>
                  </div>


                  <div class="col col-lg-6 ">
                     <section class="inner_page_head">
                        <div class="container_fuild">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="full">
                                    <h3 style="margin-top: 19px;">Shipping Address</h3>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                     <div class="full">
                        <form action="{{url('/shipping-store')}}" method="POST">
                            @csrf
                           <fieldset>
                              <input type="text" id="ship_name" value="" placeholder="Enter receivers full name" name="name" required style="width: 95%;margin-bottom:5px;padding:10px 15px; border-radius: 15px; border:1px solid black;"/>
                              <input type="email" id="ship_email" placeholder="Enter receivers email address" name="email" required style="width: 95%;margin-bottom:5px;padding:10px 15px; border-radius: 15px; border:1px solid black;"/>
                              <input type="text" id="ship_phone" placeholder="Enter receivers phone number" name="phone" required style="width: 95%;margin-bottom:5px;padding:10px 15px; border-radius: 15px; border:1px solid black;"/>
                              <input type="text" id="ship_add" placeholder="Enter receivers shipping address (House no.,Street,area)" name="add" required style="width: 95%;margin-bottom:5px;padding:10px 15px; border-radius: 15px; border:1px solid black;"/>
                              <input type="text" id="ship_city" placeholder="Enter receivers city" name="city" required style="width: 95%;margin-bottom:5px;padding:10px 15px; border-radius: 15px; border:1px solid black;"/>
                              <input type="text" id="ship_district" placeholder="Enter receivers district" name="district" required style="width: 95%;margin-bottom:5px;padding:10px 15px; border-radius: 15px; border:1px solid black;"/>
                              <input type="text" id="ship_zip" placeholder="Enter zip code" name="zip" required style="width: 95%;margin-bottom:5px;padding:10px 15px; border-radius: 15px; border:1px solid black;"/>

                              <button class="btn" style="float:right; color: rgb(255, 255, 255); background:#dc3545; margin-top: 5px;" type="submit" > Submit <i class="fa-solid fa-arrow-right"></i> </button>
                           </fieldset>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- end Form section -->

@endsection
