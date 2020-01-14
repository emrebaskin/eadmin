<div class="form-group col-md-{{ $grid }}">
    @if($label)<label for="{{ $id }}">{{ $label }}</label>@endif
    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}" class="form-control {{ $class }}"
           placeholder="{{ $placeholder ?? $label }}" {{ $disabled ? 'disabled' : '' }}>
</div>
