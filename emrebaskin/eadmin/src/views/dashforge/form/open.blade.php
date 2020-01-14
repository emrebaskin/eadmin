<form  class="{{ $class }}" action="{{ $action }}" method="{{ $method }}"  {{ $enctype ? 'enctype="'.$enctype.'"' : '' }}>
    <div class="form-row">
        @csrf
