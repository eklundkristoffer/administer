@extends('administer::layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('administer.models') }}">Models</a></li>
    <li class="breadcrumb-item"><a href="{{ route('administer.model', $namespace = get_class($record)) }}">{{ $namespace }}</a></li>
    <li class="breadcrumb-item active">Edit {{ $record->getKey() }}</li>
@endsection

@section('content')
    <h3>{{ get_class($record) }}</h3>

    <form method="POST">
        {{ csrf_field() }}

        @foreach($fields['editable_fields'] as $field)
            @component('administer::components.formgroup', ['name' => $field, 'value' => $record->{$field}])@endcomponent
        @endforeach

        <input type="submit" value="Save" class="btn btn-primary">
    </form>
@endsection