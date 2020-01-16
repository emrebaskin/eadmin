<div class="form-group col-md-{{ $grid }}">
    @if($label)<label for="{{ $id }}">{{ $label }}</label>@endif
    <select id="{{ $id }}" name="{{ $name }}" value="{{ $value }}" class="form-control select2 {{ $class }}"
           placeholder="{{ $placeholder ?? $label }}" {{ $disabled ? 'disabled' : '' }}>

        <option label="{{ __('Choose one') }}"></option>
        @foreach($datas as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? ' selected' : (old($name) == $value ? ' selected' : '') }}>{{ $label }}</option>
        @endforeach

    </select>

    @if(isset($errors) && $errors->get($name))

        <small class="form-text text-danger">

            @foreach($errors->get($name) as $message)
                {{ $message }}
            @endforeach

        </small>

    @endif

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
