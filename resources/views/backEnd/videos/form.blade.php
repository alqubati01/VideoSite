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
    @php $input = 'meta_keyword' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta Keyword</label>
            <input
                type="text" name="{{ $input }}"
                value="{{ isset($row) ? $row->{ $input } : '' }}"
                class="form-control @error($input) text-danger @enderror">
            @error($input)
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    @php $input = 'youtube' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Youtube URL</label>
            <input
                type="url" name="{{ $input }}"
                value="{{ isset($row) ? $row->{ $input } : '' }}"
                class="form-control @error($input) text-danger @enderror">
            @error($input)
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    @php $input = 'published' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Statues</label>
            <select
                name="{{ $input }}" id=""
                class="form-control @error($input) text-danger @enderror">
                <option value="1" {{ isset($row) && $row->$input == 1 ? 'selected' : '' }}>Published</option>
                <option value="0" {{ isset($row) && $row->$input == 0 ? 'selected' : '' }}>Hidden</option>
            </select>
            @error($input)
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    @php $input = 'category_id' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Category</label>
            <select
                name="{{ $input }}" id=""
                class="form-control @error($input) text-danger @enderror">
                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}" {{ isset($row) && $row->$input == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            @error($input)
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    @php $input = 'image' @endphp
    <div class="col-md-6">
        <div>
            <label>Image</label>
            <input type="file" name="{{ $input }}">
            @error($input)
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    @php $input = 'description' @endphp
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Description</label>
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
    @php $input = 'meta_description' @endphp
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta Description</label>
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
    @php $input = 'skills[]' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Skills</label>
            <select
                name="{{ $input }}" id=" " style="height: 100px;"
                class="form-control @error($input) text-danger @enderror" multiple >
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}" {{ in_array($skill->id, $selectedSkills) ? 'selected' : ''}}>{{ $skill->name }}</option>
                @endforeach
            </select>
            @error($input)
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    @php $input = 'tags[]' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Tags</label>
            <select
                name="{{ $input }}" id=" " style="height: 100px;"
                class="form-control @error($input) text-danger @enderror" multiple >
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, $selectedTags) ? 'selected' : ''}}>{{ $tag->name }}</option>
                @endforeach
            </select>
            @error($input)
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>

