@extends('layouts.app')

@section('content')
<div class="col-md-9">
    <div class="card mt-5">

        <h1 class="card-header text-center">Welcome to High School Bowling</h1>

        <div class="card-body">
            {{--@if (session('status'))--}}
                {{--<div class="alert alert-success" role="alert">--}}
                    {{--{{ session('status') }}--}}
                {{--</div>--}}
            {{--@endif--}}

            <h3>
                <img src="images/bowling_smash.png" width="50%">
                Let's Get Ready to Roll...
            </h3>
        </div>
    </div>
</div>
@endsection