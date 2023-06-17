<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Orderzy</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{asset('user/css/bootstrap.min.css')}}"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="{{asset('user/css/slick.css')}}"/>
		<link type="text/css" rel="stylesheet" href="{{asset('user/css/slick-theme.css')}}"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="{{asset('user/css/nouislider.min.css')}}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{asset('user/css/font-awesome.min.css')}}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{asset('user/css/style.css')}}"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script src="path/from/html/page/to/jquery.min.js"></script>
		<script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>

		    <!-- Toastr ---->
			<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    	<script type="text/javascript" src="{{ asset('web/assets/js/custom.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <!-- Styles -->


    <style type="text/css">
        body {
            background: whitesmoke;
        }
        button {
            background-color: darkslategrey;
            color: white;
            border: 0;
            /* font-size: 18px; */
            font-weight: 500;
            border-radius: 7px;
            padding: 10px 10px;
            cursor: pointer;
            white-space: nowrap;
        }
        #success {
            background: green;
        }
        #error {
            background: red;
        }
        #warning {
            background: coral;
        }
        #info {
            background: cornflowerblue;
        }
        #question {
            background: grey;
        }
		</style>

    </head>
	<body>
        @include('sweetalert::alert')
		<!-- HEADER -->
		@include('user.header')
		<!-- /HEADER -->

		@yield('user.content')

		<!-- NEWSLETTER -->
		@include('user.newsletter')
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		@include('user.footer')
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="{{asset('user/js/jquery.min.js')}}"></script>
		<script src="{{asset('user/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('user/js/slick.min.js')}}"></script>
		<script src="{{asset('user/js/nouislider.min.js')}}"></script>
		<script src="{{asset('user/js/jquery.zoom.min.js')}}"></script>
		<script src="{{asset('user/js/main.js')}}"></script>
        <script>
            $(document).ready(function(){

              $("#billtoship").click(function(){

                if(this.checked){
                  $("#ship_name").val($("#bill_name").val());
                  $("#ship_email").val($("#bill_email").val());
                  $("#ship_phone").val($("#bill_phone").val());
                  $("#ship_add").val($("#bill_add").val());
                  $("#ship_city").val($("#bill_city").val());
                  $("#ship_district").val($("#bill_district").val());
                  $("#ship_zip").val($("#bill_zip").val());
                }else{
                  $("#ship_name").val('');
                  $("#ship_email").val('');
                  $("#ship_phone").val('');
                  $("#ship_add").val('');
                  $("#ship_city").val('');
                  $("#ship_district").val('');
                  $("#ship_zip").val('');
                }
              });

            });
          </script>

<script>
    function confirmation(ev) {
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href');
      console.log(urlToRedirect);
      swal({
          title: "Are you sure to remove this product",
          text: "You will not be able to revert this!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willCancel) => {
          if (willCancel) {
              window.location.href = urlToRedirect;
          }


      });


  }
  </script>

	</body>
</html>
