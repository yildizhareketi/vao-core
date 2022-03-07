<div class="form-group" id="formGroup{{ $name }}" style="@if($hidden) display:none; @endif">

    @if(!$noLabel)
        @if( $label || $name)
            <label for="{{ $name }}">
                {{ $label ?: $name }} @if($required)<span class="text-danger">*</span>@endif
            </label>
        @endif
    @endif


    @php
        $class = ''
    @endphp

    @error($name)
        @php
            $class = 'is-invalid'
        @endphp
    @enderror

    @php

        if (!$value) {
            if(isset($model)) {
                $value = $model->$name;
            }else{
                $value = old($name);
            }
        }

    @endphp

    <input type="text" class="form-control {{$class}}" id="{{ $name }}" name="{{ $name }}"
           value="{{$value}}"
           placeholder="{{ $placeholder ?? $label }}" @if($required) required @endif>

    @error($name)

    <div class="invalid-feedback">{{ $label }} {{ $message }}</div>

    @enderror

</div>

