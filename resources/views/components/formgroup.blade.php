@php
    $hasError = (isset($name) && ! empty($name) && $errors->has($name));
    $type = (isset($type) && ! empty($type)) ? $type : 'text' ;
    $value = (isset($value)) ? $value : old($name) ;
    $valueGiven = function () use ($type, $name, $value) {
        if ($type != 'password' && ! isset($value)) {
            return old($name);
        }

        return $value;
    }
@endphp

<div class="form-group {{ ($hasError) ? 'has-danger' : '' }}">
    @if (isset($label) && $label)
        <label class="form-control-label">{{ $label }}</label>
    @else
        <label class="form-control-label">{{ title_case(preg_replace('/_/i', ' ', $name)) }}</label>
    @endif

    @if (isset($field) && $field) 
        {{ $field }}
    @else
        <input type="{{ $type }}" name="{{ $name }}" value="{{ $valueGiven() }}" class="{{ $class or 'form-control' }}">
    @endif

    @if ($hasError)
        <div class="form-control-feedback">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>