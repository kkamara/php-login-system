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
            <form action="{{ route("register.submit") }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="registerName" class="form-label">{{ __("Name") }}</label>
                    <input
                        type="text"
                        class="form-control"
                        id="registerName"
                        name="name"
                        value="{{ old("name") }}"
                    >
                </div>
                <div class="mb-3">
                    <label for="registerEmail" class="form-label">{{ __("Email address") }}</label>
                    <input
                        type="text"
                        class="form-control"
                        id="registerEmail"
                        name="email"
                        value="{{ old("email") }}"
                    >
                </div>
                <div class="mb-3">
                    <label
                        for="registerPassword"
                        class="form-label"
                    >
                        {{ __("Password") }}
                    </label>
                    <input
                        type="password"
                        class="form-control"
                        id="registerPassword"
                        name="password"
                        value="{{ old("password") }}"
                    />
                </div>
                <div class="mb-3">
                    <label
                        for="registerPasswordConfirmed"
                        class="form-label"
                    >
                        {{ __("Password confirmed") }}
                    </label>
                    <input
                        type="password"
                        class="form-control"
                        id="registerPasswordConfirmed"
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