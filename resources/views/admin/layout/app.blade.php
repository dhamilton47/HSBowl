@extends('layouts.app')

@section('sidebar')
    <aside class="">
        <div class="card">
            <h5 class="card-header text-center" style="background-color: #a1cbef">School Info</h5>

            <ul class="card-body">
                <li class="nav-link pl-0">
                    <a href="{{ route('admin.dashboard.index') }}" style="font-size: small">Admin Dashboard</a>
                </li>
            </ul>
        </div>
    </aside>
@endsection

@section('content')
    @yield('administration-content')
@endsection
