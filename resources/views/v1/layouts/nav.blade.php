<nav class="navbar navbar-expand-lg bg-body-tertiary login-system-navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route("home") }}">{{ config("app.name") }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route("home") }}">Home</a>
          </li>
        </ul>
        <ul class="navbar-nav right-navbar">
            @if(auth()->user())
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  User
                </a>
                <ul class="dropdown-menu">
                    <li>
                      <a
                        class="dropdown-item" 
                        href="#"
                      >
                        Profile
                      </a>
                    </li>
                    <li>
                      <a
                        class="dropdown-item" 
                        href="#"
                      >
                        Settings
                      </a>
                    </li>
                  <li>
                    <a
                      class="dropdown-item" 
                      href="{{ route("logout") }}"
                    >
                      Sign Out
                    </a>
                  </li>
                </ul>
            </li>
            @else
            <li class="nav-item">
                <a
                    class="nav-link active" 
                    aria-current="page" 
                    href="{{ route("login") }}"
                >
                    Sign In
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link active" 
                    aria-current="page" 
                    href="#"
                >
                    Register
                </a>
            </li>
            @endif
        </ul>
      </div>
    </div>
</nav>