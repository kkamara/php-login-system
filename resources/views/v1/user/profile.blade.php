@extends("v1/layouts/main")

@section("content")
    <div class="row mt-4">
        <div class="col-4">
            <div class="card">
                <div class="avatar-container text-center">
                    <img 
                        src="/images/avatar.png" 
                        alt="User profile picture" 
                        class="profile-avatar"
                    />
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="card-text">Exercitation do fugiat amet voluptate excepteur fugiat sint quis sit.</p>
                    <a href="#" class="btn btn-primary">{{ $user->email }}</a>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card text-center">
                <div class="card-header">
                    Profile Page
                </div>
                <div class="card-body">
                    <h5 class="card-title">Hey {{ $user->name }}, welcome back!</h5>
                    <p class="card-text">Non reprehenderit nulla et officia esse excepteur consequat aute consectetur.</p>
                    <a href="#" class="btn btn-primary">{{ $user->email }}</a>
                </div>
                <div class="card-footer text-muted">
                    {{ config("app.name") }}
                </div>
            </div>
        </div>
    </div>
@stop