<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} - {{ config("app.name") }}</title>
    <link
        rel="icon"
        type="image/png"
        href="/favicon.png"
    />
    @vite([
        "resources/sass/app.scss",
        "resources/css/pulse_bootstrap.css",
    ])
</head>
<body>
    @include("v1/layouts/nav")

    <div class="container">
        @section("content") @show
    </div>

    <footer class="mt-4 text-center">
        <a 
            href="https://www.github.com/kkamara"
            className="btn btn-lg btn-default"
        >
            www.kelvinkamara.com
        </a>
    </footer>

    @vite("resources/js/app.js")
</body>
</html>