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

    @component('backEnd.shared.create', ['title_page' => $title_page, 'desc_page' => $desc_page])
        <form action="{{ route($routeName.'.store') }}" method="POST">
            @include('backEnd.'.$folderName.'.form')

            <button type="submit" class="btn btn-primary pull-right">{{ $title_page }}</button>
            <div class="clearfix"></div>
        </form>
    @endcomponent

@endsection

@push('javascript')
@endpush
