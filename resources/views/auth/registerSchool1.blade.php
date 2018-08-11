@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header">{{ __('School Registration Check') }}</h3>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register.continue.school.part1') }}" aria-label="{{ __('School') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name"
                                           type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name"
                                           value="{{ old('name') }}"
                                           autofocus>

                                    @if ($errors->has('name'))
                                        {{ $errors }}
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    {{--<a class="btn btn-primary" href="{{ route('register.school.part2') }}" role="button">--}}
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Continue') }}
                                    </button>
                                    {{--</a>--}}
                                 </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
