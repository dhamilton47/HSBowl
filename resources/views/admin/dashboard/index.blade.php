@extends('admin.layout.app')

@section('administration-content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header" style="background-color: #a1cbef">Administration Dashboard</h5>

                    <div class="card-body">
                        {{--@if (session('status'))--}}
                            {{--<div class="alert alert-success" role="alert">--}}
                                {{--{{ session('status') }}--}}
                            {{--</div>--}}
                        {{--@endif--}}

                        <h5 class="card-title">
                            You have administrative rights to the following:
                        </h5>

                        <ul>
                            @foreach ($user->administers as $administers)
                                <li>
                                    {{ $administers->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer">
                        put a button or two here
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
