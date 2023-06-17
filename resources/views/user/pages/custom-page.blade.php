@extends('user.master')

@section('user.content')
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <h1>{{$pageInfo->title}}</h1>
                <h6 class="mt-4 mb-2">{{$pageInfo->frst_desp}}</h6>
                <div>{!! $pageInfo->scnd_desp !!}</div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
@endsection
