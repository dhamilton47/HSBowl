@extends ('layouts.base')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <avatar-form :user="{{ $profileUser }}"></avatar-form>
    </div>
@endsection