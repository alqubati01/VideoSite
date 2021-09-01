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
        @include('backEnd.'.$folderName.'.form')

        @slot('md4')
            <h3>Replay On Message</h3>
            <form action="{{ route('message.replay', $row->id) }}" method="POST">
                @csrf
                @php $input = 'message' @endphp
                <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Message</label>
                        <textarea
                            name="{{ $input }}" id="" cols="30" rows="5"
                            class="form-control @error($input ) text-danger @enderror">

                        </textarea>
                        @error($input)
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Replay Message</button>
                <div class="clearfix"></div>
            </form>
        @endslot
    @endcomponent

@endsection

@push('javascript')
@endpush
