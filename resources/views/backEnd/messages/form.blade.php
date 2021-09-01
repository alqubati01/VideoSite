@csrf
<div class="row">
    @php $input = 'name' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Name</label>
            <input
                type="text" name="{{ $input }}"
                value="{{ isset($row) ? $row->{$input} : '' }}"
                class="form-control @error($input) text-danger @enderror">
            @error($input)
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    @php $input = 'email' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Email</label>
            <input
                type="text" name="{{ $input }}"
                value="{{ isset($row) ? $row->{ $input } : '' }}"
                class="form-control @error($input) text-danger @enderror">
            @error($input)
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    @php $input = 'message' @endphp
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Message</label>
            <textarea
                name="{{ $input }}" id="" cols="30" rows="5"
                class="form-control @error($input ) text-danger @enderror">
                {{ isset($row) ? $row->{ $input } : '' }}
            </textarea>
            @error($input)
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>


