<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">{{ $title_page }}</h4>
                <p class="card-category">{{ $desc_page }}</p>
            </div>
            <div class="card-body">
                {{ $slot }}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{ isset($md4) ? $md4 : '' }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
