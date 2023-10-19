<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="/js/my-app.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="/css/my-app.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid ms-4 me-4">
              <a class="navbar-brand" href="/"><img src="/img/ZaedFlorist.png" alt="Home" width="120px"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @auth
                  <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="/plant">Plant</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/pot">Pot</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/growing-media">Growing Media</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/cart">Cart</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/helpdesk">Contact Us</a>
                    </li>
                  </ul>
                  <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome back, @foreach ($users as $user){{ $user->name }}@endforeach
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                          <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">
                              <i class="bi bi-box-arrow-right"></i>
                              <img src="/img/logout.png" width="20px" alt="logout">          Logout
                            </button>
                          </form>
                        </li>

                      </ul>
                    </li>
                  </ul>
                @else
                  <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                  </ul>
                @endauth
                </div>
            </div>
          </nav>
          @yield('content')
        <footer class="bg-dark text-center text-white">
          <div class="container p-4">
            <section class="">
              <form action="">
                <div class="row d-flex justify-content-center">
                  <div class="col-auto">
                    <p class="pt-2">
                      <strong>Sign up for our new product!</strong>
                    </p>
                  </div>
                  <div class="col-md-5 col-12">
                    <div class="form-outline form-white mb-4">
                      <input type="email" id="form5Example21" class="form-control" />
                      <label class="form-label" for="form5Example21">Email address</label>
                    </div>
                  </div>
                  <div class="col-auto">
                    <button type="submit" class="btn btn-outline-light mb-4">
                      Subscribe
                    </button>
                  </div>
                </div>
              </form>
            </section>

            <section class="mb-4">
              <p>

              </p>
            </section>

            <section>
              <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                  <h5 class="text-uppercase">Social Media</h5>

                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="https://www.facebook.com/zaed.abdullah.1232/" class="text-white">Facebook</a>
                    </li>
                    <li>
                      <a href="https://www.instagram.com/z4edthalib/" class="text-white">Instagram</a>
                    </li>
                    <li>
                      <a href="https://wa.me/+6289506076868" class="text-white">Whatsapp</a>
                    </li>
                    <li>
                      <a href="https://www.linkedin.com/in/zaed-abdullahh-a14a24172/" class="text-white">LinkedIn</a>
                    </li>
                  </ul>
                </div>
              </div>
            </section>
          </div>
          <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright: Zaed Abdullah
          </div>
        </footer>
    </body>
</html>
