{{--  @dd($hotdeal );  --}}
@foreach ($hotdeals as $hotdeal)
<div id="" class="section" style="background-image: url('{{ asset('images/hotdeal/'.$hotdeal->image) }}'); background-repeat: no-repeat; background-position: center center;
    background-size: cover;
    height: 350px;
    margin-bottom: 0;">
@endforeach
	<!-- container -->

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hot-deal">
					<ul class="hot-deal-countdown">
					</ul>
					<h2 class="text-uppercase">{{$hotdeal->frst_desp}}</h2>
					<p>{{$hotdeal->scnd_desp}}</p>
					{{-- @dd($hotdealshop); --}}
                    {{--  @foreach ($hotdeal as $hotdeals)  --}}
					<a class="primary-btn cta-btn" href="{{url('/hotdeal_shop/{name}')}}">Shop now</a>
                    {{--  @endforeach  --}}
				</div>
			</div>
		</div>
	</div>
	<!-- /container -->
</div>
{{-- @endforeach --}}
