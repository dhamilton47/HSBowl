@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header">
                        Registration Complete
                    </h3>

                    <div class="card-body">
                        Now we need to let the email confirmation process complete and then you will be able to use the account.
                    </div>

                    <div class="card-footer">
                        <form method="get" action="{{ route('home') }}" aria-label="{{ __('Home') }}">
                            @csrf

                            <div class="form-group row ml-2 mb-0">
                                <a class="btn btn-primary" href="{{ route('home') }}" role="button">Ok</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
