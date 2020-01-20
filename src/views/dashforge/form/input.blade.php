<div class="form-group col-md-{{ $grid }}">
    @if($label)<label for="{{ $id }}">{{ $label }}</label>@endif
    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}" class="form-control {{ $class }} @error($name) is-invalid @enderror"
           placeholder="{{ $placeholder ?? $label }}" {{ $disabled ? 'disabled' : '' }}>

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
