@extends('backEnd.layouts.app')

@section('title_page')
    {{ $title_page }}
@endsection

@push('css')
@endpush

@section('content')
    @component('backEnd.layouts.header')
        @slot('nav_title')
            {{ $title_page }}
        @endslot
    @endcomponent

    @component('backEnd.shared.edit', ['title_page' => $title_page, 'desc_page' => $desc_page])
        <form action="{{ route($routeName.'.update', $row->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @include('backEnd.'.$folderName.'.form')

            <button type="submit" class="btn btn-primary pull-right">{{ $title_page }}</button>
            <div class="clearfix"></div>
        </form>

        @slot('md4')
            @php
                $url = getYoutubeId($row->youtube);
            @endphp

            @if($url)
                <iframe
                    width="300" src="https://www.youtube.com/embed/{{ $url }}"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            @endif

            <img src="{{ url('uploads/'.$row->image) }}" alt="" class="pt-3" width="200">
        @endslot
    @endcomponent

    @component('backEnd.shared.edit' , ['title_page' => "Comments" , 'desc_page' => "here we can Control comments"])
        @include('backEnd.comments.index')
        @slot('md4')
            @include('backEnd.comments.create')
        @endslot
    @endcomponent

@endsection

@push('javascript')
@endpush
