@extends('administer::layouts.app')

@section('content')
    <ul>
        @can('model.view')
            <li><a href="{{ route('administer.models') }}">Models</a></li>
        @endcan
    </ul>
@endsection