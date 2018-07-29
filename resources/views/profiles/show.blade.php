@extends ('layouts.base')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="page-header">
            {{ $user->name }}
        </div>
    </div>
@endsection