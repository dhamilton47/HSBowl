@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header">{{ __('User Role Information') }}</h3>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register.role') }}" aria-label="{{ __('School') }}">
                            @csrf

                            <div class="form-group">
                                <label for="role" class="col-md col-form-label">{{ __('Role') }}</label>
                            {{--<div class="form-group row">--}}
                                {{--<label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>--}}

                                <div class="col-md">
                                    <select id="role"
                                           class="form-control"
                                           name="role"
                                           required
                                           autofocus>
                                        <option selected>Please select from these options...</option>
                                        <option value="1">Scorer</option>
                                        <option value="2">Team Administrator/Scorer</option>
                                        <option value="3">Coach</option>
                                        <option value="4">Athletic Director</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md col-form-label">
                                    Which teams are you working with?
                            </div>

                            <div class="form-group row">
                                <div class="col-md-1 col-form-label text-md-right"></div>
                                <div class="col-md-11">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                                        <label class="form-check-label" for="gridCheck1">
                                            {{ __("Men's Varsity") }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-1 col-form-label text-md-right"></div>
                                <div class="col-md-11">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck2">
                                        <label class="form-check-label" for="gridCheck2">
                                            {{ __("Men's Junior Varsity") }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-1 col-form-label text-md-right"></div>
                                <div class="col-md-11">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck3">
                                        <label class="form-check-label" for="gridCheck3">
                                            {{ __("Women's Varsity") }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-1 col-form-label text-md-right"></div>
                                <div class="col-md-11">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck4">
                                        <label class="form-check-label" for="gridCheck4">
                                            {{ __("Women's Junior Varsity") }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group justify-content-center mb-0">
                                <div class="col">
                                    {{--<a class="btn btn-primary" href="{{ route('register.role') }}" role="button">--}}
                                        {{--{{ __('Continue') }}--}}
                                    {{--</a>--}}
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
