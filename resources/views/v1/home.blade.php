@extends("v1/layouts/main")

@section("content")
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="p-5 mb-4 bg-body-tertiary rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">{{ $title }}</h1>
                    <p class="col-md-8 fs-4">Exercitation eu Lorem aliqua eiusmod eu ut ut enim.</p>
                    <a
                        class="btn btn-primary btn-lg"
                        href="{{ route("home") }}"
                    >
                        Refresh Page
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop