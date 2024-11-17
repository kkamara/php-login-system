@extends("v1/layouts/main")

@section("content")
    <div class="row mt-4">
        <div class="col-md-6 offset-md-3">
            @if(count($errors))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="{{ route("login.submit") }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="loginEmail" class="form-label">{{ __("Email address") }}</label>
                    <input
                        type="text"
                        class="form-control"
                        id="loginEmail"
                        aria-describedby="emailHelp"
                        name="email"
                        value="{{ old("email") }}"
                    >
                </div>
                <div class="mb-3">
                    <label
                        for="loginPassword"
                        class="form-label"
                    >
                        {{ __("Password") }}
                    </label>
                    <input
                        type="password"
                        class="form-control"
                        id="loginPassword"
                        name="password"
                        value="{{ old("password") }}"
                    />
                </div>
                <div class="mb-3 text-end">
                  <input
                        type="checkbox"
                        class="form-check-input"
                        id="loginRememberMe"
                        name="rememberMe"
                        value="true"
                        @if(old("rememberMe") === "true") checked @endif
                    />
                  <label class="form-check-label" for="loginRememberMe">{{ __("Remember me") }}</label>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-success">
                        {{ __("Submit") }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop