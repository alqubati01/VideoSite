@extends('layouts.app')

@section('title_page')
    {{  $video->name }}
@endsection

@section('meta_description' , $video->meta_description)

@section('meta_keyword' , $video->meta_keyword)

@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h1>{{ $video->name }}</h1>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @php $url = getYoutubeId($video->youtube) @endphp
                    @if($url)
                        <iframe width="100%" height="500" src="https://www.youtube.com/embed/{{ $url }}"
                                style="margin-bottom: 20px" frameborder="0" allowfullscreen></iframe>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <p>
                        <span style="margin-right: 20px">
                            <i class="nc-icon nc-user-run"></i> : {{ $video->user->name }}
                        </span>
                        <span style="margin-right: 20px">
                            <i class="nc-icon nc-calendar-60"></i> :  {{ $video->created_at }}
                        </span>
                        <span style="margin-right: 20px">
                            <i class="nc-icon nc-single-copy-04"></i> :
                            <a href="{{ route('front.category', $video->category->id) }}">
                                {{ $video->category->name }}
                            </a>
                        </span>
                    </p>
                    <p>
                        {{ $video->description }}
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <h6>Tags</h6>
                <p>
                    @foreach($video->tags as $tag)
                        <a href="{{ route('front.tag' , $tag->id) }}">
                            <span class="badge badge-pill badge-primary">{{ $tag->name }}</span>
                        </a>
                    @endforeach
                </p>
            </div>
            <div class="col-md-3">
                <h6>Skills</h6>
                <p>
                    @foreach($video->skills as $skill)
                        <a href="{{ route('front.skill' , $skill->id) }}">
                            <span class="badge badge-pill badge-info">{{ $skill->name }}</span>
                        </a>
                    @endforeach
                </p>
            </div>
            <br><br>
            @include('frontEnd.video.comments')
            @include('frontEnd.video.createComment')
        </div>
    </div>
@endsection
