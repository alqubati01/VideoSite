<form action="{{ route($routeName.'.destroy', $row) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove {{ $singleModelName }}">
        <i class="material-icons">delete</i>
    </button>
</form>
