<label class="checkbox @if($lg) checkbox-lg @endif checkbox-success">
    <input type="checkbox" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}" @if($checked) checked @endif  />
    <span style="margin-right: 5px;"></span>

    {{ $label }}
</label>
