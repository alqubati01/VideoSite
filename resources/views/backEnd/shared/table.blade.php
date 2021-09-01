<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class=" d-flex justify-content-between card-header card-header-primary">
                <div>
                    <h4 class="card-title ">{{ $title_page }}</h4>
                    <p class="card-category">{{ $desc_page }}</p>
                </div>
                {{ $addButton }}
            </div>
            <div class="card-body">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
