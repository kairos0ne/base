@extends('layouts.app')
@section('content')

    <client
            username="{{ $user = auth()->user()->name}}"
            userid="{{ $user = auth()->user()->id }}"
    ></client>

@endsection