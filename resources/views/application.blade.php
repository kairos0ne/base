@extends('layouts.app')
@section('content')
	<introduction
		username="{{ $user = auth()->user()->name}}"
	></introduction>
	<addclient
		v-if="showClient"
		:userid="{{ $user = auth()->user()->id }}"
	></addclient>
	{{-- Insert the select client component --}}
	<addproject
		v-if="showProject"
	></addproject>
	{{-- Insert the select brief component --}}
	<addbrief
		v-if="showBrief"
	></addbrief>

@endsection