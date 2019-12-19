@extends('back_end.layout.app')
@section('title')
    home page
@endsection
@section('content')
    @component('back_end.layout.header', ['nav_title'=>"home page"])
    @endcomponent
    @include('back_end.home-sections.statics')
    @include('back_end.home-sections.latest-comments')
@endsection