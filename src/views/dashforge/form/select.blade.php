<div class="form-group col-md-{{ $grid }}">
    @if($label)<label for="{{ $id }}">{{ $label }}</label>@endif
    <select id="{{ $id }}" name="{{ $name }}" value="{{ $value }}" class="form-control select2 {{ $class }} @error($name) is-invalid @enderror"
           placeholder="{{ $placeholder ?? $label }}" {{ $disabled ? 'disabled' : '' }}>
        <option value="">&nbsp;</option>
        @foreach($datas as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? ' selected' : (old($name) == $value ? ' selected' : '') }}>{{ $label }}</option>
        @endforeach

    </select>

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

@section('customScripts')
    @if($noScript === false)
        <script>
            $('#{{ $id }}').select2({
                placeholder: "{{ $placeholder ?? __('Choose one') }}",
                searchInputPlaceholder: "{{ $placeholderSearch ?? __('Search..') }}",
                allowClear: true
            });
        </script>
    @endif
@endsection
