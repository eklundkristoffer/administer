@extends('administer::layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active">Models</li>
@endsection

@section('content')
    <ul>
        @forelse($models as $model => $options)
            <li><a href="{{ route('administer.model', $model) }}">{{ $model }}</a></li>
        @empty
            <li>{{ trans('administer::models.empty') }}</li>
        @endforelse
    </ul>
@endsection