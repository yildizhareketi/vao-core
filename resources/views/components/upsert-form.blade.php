<div class="card card-custom example example-compact gutter-b">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="card-title">
            {{ $title }}
        </div>
        <a href="{{ route($modelSlug . '.index') }}" type="button" class="btn btn-sm btn-secondary btn-pill">
            <i class="fa fa-arrow-left"></i> Geri
        </a>
    </div>

    <form action="{{ $method == 'PUT' ? route($modelSlug.'.update', $modelId) : route($modelSlug.'.store') }}" method="POST" enctype="multipart/form-data">
        <div class="card-body">

            @if($method == 'PUT')
                @method('PUT')
            @endisset
            @csrf

            {{ $slot }}

        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <button type="submit" class="btn btn-success"> {{ $buttonText }}</button>
                </div>
            </div>
        </div>
    </form>
</div>
