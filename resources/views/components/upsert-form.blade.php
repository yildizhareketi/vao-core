<div class="card card-custom example example-compact gutter-b">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">{{ $title }}</h3>
        </div>
    </div>

    <form action="{{ $method == 'PUT' ? route($modelSlug.'.update') : route($modelSlug.'.store') }}" method="POST" enctype="multipart/form-data">
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
