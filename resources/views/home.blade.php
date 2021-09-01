@extends('layouts.app')

@section('title_page')
Videos
@endsection

@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h2>Latest videos</h2>
                @if(request()->has('search') && request()->get('search') != '')
                    <p style="margin-top: 10px">
                        you are search on  <b>{{ request()->get('search') }}</b> |  <a href="{{ route('home') }}"> Reset </a>
                    </p>
                @endif
            </div>
            @include('frontEnd.shared.video-row')
        </div>
    </div>
@endsection
