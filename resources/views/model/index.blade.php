@extends('administer::layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('administer.models') }}">Models</a></li>
    <li class="breadcrumb-item active">{{ $namespace = get_class($model) }}</li>
@endsection

@section('content')
    <h3>{{ $namespace }}</h3>

    <table class="table table-striped">
        @foreach($fields['present_fields'] as $field)
            <th>{{ $field }}</th>
        @endforeach
        <th></th>

        @foreach($model->get() as $record)
            <tr>
                @foreach($fields['present_fields'] as $field)
                    <td>{{ $record->{$field} }}</td>
                @endforeach

                <td><a href="{{ route('administer.model.edit', [$namespace, $record->getKey()]) }}">Edit</a></td>
            </tr>
        @endforeach
    </table>
@endsection