@extends('layouts.app')

@section('title_page')
    Video Site
@endsection

@section('content')
    @include('frontEnd.home.hero')

    <div class="container">
        @include('frontEnd.home.videos')
    </div>
    @include('frontEnd.home.statics')
    <div class="container">
        @include('frontEnd.home.contact')
    </div>
@endsection
