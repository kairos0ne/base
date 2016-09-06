@extends ('layouts.app')
@section('content')
<div id="dashboard">
	@if(isset($user))
    <div id="app">
        <router-view></router-view>
    </div>
    @else
    @endif
</div>
@endsection