@extends('layouts.app')

@section('title_page')
    {{  $category->name }}
@endsection

@section('meta_description' , $category->meta_description)

@section('meta_keyword' , $category->meta_keyword)


@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h1>{{ $category->name }}</h1>
            </div>
            @include('frontEnd.shared.video-row')
        </div>
    </div>
@endsection
