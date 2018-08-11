@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header">{{ __('School Registration') }}</h3>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register.continue.school.part2') }}" aria-label="{{ __('School') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name"
                                           type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name"
                                           value="{{ old('name') }}"
                                           required
                                           autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                                <div class="col-md-6">
                                    <input id="city"
                                           type="text"
                                           class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                                           name="city"
                                           value="{{ old('city') }}"
                                           required>

                                    @if ($errors->has('city'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                                <div class="col-md-6">
                                    <input id="state"
                                           type="text"
                                           class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}"
                                           name="state"
                                           value="{{ old('state') }}"
                                           required>

                                    @if ($errors->has('state'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="district" class="col-md-4 col-form-label text-md-right">{{ __('District') }}</label>

                                <div class="col-md-6">
                                    <input id="district"
                                           type="text"
                                           class="form-control{{ $errors->has('district') ? ' is-invalid' : '' }}"
                                           name="district"
                                           required>

                                    @if ($errors->has('district'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('district') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 col-form-label text-md-right"></div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="team1" name="team1">
                                        <label class="form-check-label" for="team1">
                                            {{ __("Men's Varsity") }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 col-form-label text-md-right"></div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="team2" name="team2">
                                        <label class="form-check-label" for="team2">
                                            {{ __("Men's Junior Varsity") }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 col-form-label text-md-right"></div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="team3" name="team3">
                                        <label class="form-check-label" for="team3">
                                            {{ __("Women's Varsity") }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 col-form-label text-md-right"></div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="team4" name="team4">
                                        <label class="form-check-label" for="team4">
                                            {{ __("Women's Junior Varsity") }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
{{--                                    <a class="btn btn-primary" href="{{ route('register.role') }}" role="button">--}}
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
