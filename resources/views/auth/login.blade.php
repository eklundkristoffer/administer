@extends('administer::layouts.auth')

@section('content')
    @component('administer::components.card', ['header' => 'Login'])
        <form method="POST">
            {{ csrf_field() }}

            @component('administer::components.formgroup', ['name' => $usernameField])@endcomponent
            @component('administer::components.formgroup', ['name' => $passwordField, 'type' => 'password'])@endcomponent

            <input type="submit" value="Login" class="btn btn-primary">
        </form>
    @endcomponent
@endsection