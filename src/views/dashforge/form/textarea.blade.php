<div class="form-group col-md-{{ $grid }}">
    @if($label)<label for="{{ $id }}">{{ $label }}</label>@endif
    <textarea id="{{ $id }}" name="{{ $name }}" class="form-control {{ $class }}"
              placeholder="{{ $placeholder ?? $label }}" rows="{{ $rows }}" {{ $disabled ? 'disabled' : '' }}>{{ $value }}</textarea>
</div>
