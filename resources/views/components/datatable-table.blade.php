@push('extra-css-after')
    <link href="{{ asset('vendor/vao-core/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
@endpush

@section('body')
    <div class="container-fluid">
        <div class="card card-custom">

            <div class="card-header">
                <div class="card-title">

						<span class="card-icon">
												<i class="flaticon2-list text-primary"></i>
											</span>
                    <h3 class="card-label">{{ $modelName }} {{ \Illuminate\Support\Facades\Config::get('theme.lang') == 'en' ? 'List':'Listesi' }}</h3>
                </div>
                @if($newButton)
                    <div class="card-toolbar">
                        <a href="{{ route($modelSlug.'.create') }}" class="btn btn-primary font-weight-bolder">
					<span class="svg-icon svg-icon-md">
						<svg xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"></rect>
														<circle fill="#000000" cx="9" cy="15" r="6"></circle>
														<path
                                                            d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                                            fill="#000000" opacity="0.3"></path>
													</g>
												</svg>
											</span>
                            {{ \Illuminate\Support\Facades\Config::get('theme.lang') == 'en' ? 'New':'Yeni' }} {{ $modelName }}
                        </a>
                    </div>
                @endif
            </div>
            {{ $slot }}
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="kt_datatable"
                       style="margin-top: 13px !important">
                    <thead>
                    <tr>
                        @foreach($columns as $key => $value)
                            <th>{{ $value }}</th>
                        @endforeach
                    </tr>
                    </thead>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
    </div>

@endsection

@php
    $data = array_keys($columns);
    $new = array_map(function ($dat){
        return ['data' => $dat];
    },$data);
    $decoded = json_encode($new)
@endphp

@push('extra-js-after')
    <script src="{{ asset('vendor/vao-core/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        var datatable = $('#kt_datatable').DataTable({
            responsive: true,
            autoWidth: false,
            processing: true,
            serverSide: true,
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Turkish.json"
            },
            ajax: {
                url: "{!!   route($modelSlug.'.datatable',$extraAttributes ?? null) !!}",
                type: "GET",
                data: {}
            },
            columns: {!! $decoded !!},
        });
    </script>
@endpush
