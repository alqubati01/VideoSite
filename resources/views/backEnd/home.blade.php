@extends('backEnd.layouts.app')

@section('title_page')
    Dashboard
@endsection

@push('css')
@endpush

@section('content')
    @component('backEnd.layouts.header')
        @slot('nav_title')
            Dashboard
        @endslot
    @endcomponent

    @include('backEnd.home.statics')
    @include('backEnd.home.latestComments')
@endsection

@push('javascript')
@endpush
