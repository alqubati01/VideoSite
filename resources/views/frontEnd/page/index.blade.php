@extends('layouts.app')

@section('title_page')
    {{  $page->name }}
@endsection

@section('meta_description' , $page->meta_description)

@section('meta_keyword' , $page->meta_keyword)

@section('content')
    <div class="section section-buttons text-center" style="min-height: 600px">
        <div class="container">
            <div class="title">
                <h1>{{ $page->name }}</h1>
            </div>
            <p>
                {!! $page->description !!}
            </p>
        </div>
    </div>
@endsection
