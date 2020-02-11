<div class="input-group my-1">
    <div class="input-group-prepend">
        <div class="input-group-text">
            <div class="custom-control custom-checkbox pd-l-15">
                <input type="checkbox" name="{{ $name }}" class="custom-control-input {{ $class }}" id="{{ $id }}" value="{{ $value }}" @if($checked) checked @endif>
                <label class="custom-control-label" for="{{ $id }}"></label>
            </div>
        </div>
    </div>
    <input type="text" class="form-control" aria-label="{{ $label }}" value="{{ $label }}" disabled>
</div>
