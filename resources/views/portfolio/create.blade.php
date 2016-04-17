@extends('layouts.app')
@section('content')
    <div class="container">
        <addwork s3baseurl="{{ env('S3_BASEURL') }}" s3bucket="{{ env('S3_BUCKET') }}" userid="{{ Auth::id() }}"></addwork>
    </div>
@endsection