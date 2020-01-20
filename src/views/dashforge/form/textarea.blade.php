<div class="form-group col-md-{{ $grid }}">
    @if($label)<label for="{{ $id }}">{{ $label }}</label>@endif
    <textarea id="{{ $id }}" name="{{ $name }}" class="form-control {{ $class }} @error($name) is-invalid @enderror"
              placeholder="{{ $placeholder ?? $label }}" rows="{{ $rows }}" {{ $disabled ? 'disabled' : '' }}>{{ $value }}</textarea>

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
