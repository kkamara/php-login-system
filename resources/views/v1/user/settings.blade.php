@extends("v1/layouts/main")

@section("content")
    <div class="row mt-4">
        <div class="col-md-6 offset-md-3">
            <h3>{{ $title }}</h3>
            @if(count($errors))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach($errors->all() as $error)
                    {{ $error }} <br/>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="{{ route("settings.submit") }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="settingsName" class="form-label">{{ __("Name") }}</label>
                    <input
                        type="text"
                        class="form-control"
                        id="settingsName"
                        name="name"
                        value="@if(old("name")) {{ old("name") }} @else{{ auth()->user()->name }}@endif"
                    >
                </div>
                <div class="mb-3">
                    <label for="settingsEmail" class="form-label">{{ __("Email address") }}</label>
                    <input
                        type="text"
                        class="form-control"
                        id="settingsEmail"
                        name="email"
                        value="@if(old("email")) {{ old("email") }} @else{{ auth()->user()->email }}@endif"
                    >
                </div>
                <div class="mb-3">
                    <label
                        for="settingsNewPassword"
                        class="form-label"
                    >
                        {{ __("New password") }}
                    </label>
                    <input
                        type="password"
                        class="form-control"
                        id="settingsNewPassword"
                        name="newPassword"
                        value="{{ old("newPassword") }}"
                    />
                </div>
                <div class="mb-3">
                    <label
                        for="settingsPassword"
                        class="form-label"
                    >
                        {{ __("Password") }}
                    </label>
                    <input
                        type="password"
                        class="form-control"
                        id="settingsPassword"
                        name="password"
                        value="{{ old("password") }}"
                    />
                </div>
                <div class="mb-3">
                    <label
                        for="settingsPasswordConfirmed"
                        class="form-label"
                    >
                        {{ __("Password confirmed") }}
                    </label>
                    <input
                        type="password"
                        class="form-control"
                        id="settingsPasswordConfirmed"
                        name="passwordConfirmed"
                        value="{{ old("passwordConfirmed") }}"
                    />
                </div>
                <div class="text-end">
                    <a href="{{ route("login") }}" class="btn btn-primary">
                        {{ __("Login") }}
                    </a>
                    <button type="submit" class="btn btn-success">
                        {{ __("Submit") }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop