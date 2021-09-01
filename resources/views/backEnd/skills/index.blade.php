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

    @component('backEnd.shared.table', ['title_page' => $title_page, 'desc_page' => $desc_page])
        @slot('addButton')
            <a href="{{ route($routeName.'.create') }}" class="btn btn-white btn-round">Add {{ $singleModelName }}</a>
        @endslot
    @endcomponent

    <div class="table-responsive">
        <table class="table">
            <thead class=" text-primary">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Control</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rows as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->name }}</td>
                    <td class="td-actions d-flex">
                        @include('backEnd.shared.buttons.edit')
                        @include('backEnd.shared.buttons.delete')
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $rows->links() !!}
    </div>
@endsection

@push('javascript')
@endpush
