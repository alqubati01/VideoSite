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
                type="email" name="{{ $input }}"
                value="{{ isset($row) ? $row->{ $input } : '' }}"
                class="form-control @error($input) text-danger @enderror">
            @error($input)
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    @php $input = 'password' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Password</label>
            <input
                type="password" name="{{ $input }}"
                class="form-control @error($input ) text-danger @enderror">
            @error($input )
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    @php $input = 'group' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Group</label>
            <select
                name="{{ $input }}" id=""
                class="form-control @error($input) text-danger @enderror">
                <option value="Admin" {{ isset($row) && $row->$input == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="User" {{ isset($row) && $row->$input == 'user' ? 'selected' : '' }}>User</option>
            </select>
            @error($input)
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
