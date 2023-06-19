<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App Contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      body {
        --s: 200px; /* control the size */
        --c1: #1d1d1d;
        --c2: #4e4f51;
        --c3: #3c3c3c;
        
        background:
          repeating-conic-gradient(from 30deg,#0000 0 120deg,var(--c3) 0 180deg) 
          calc(.5*var(--s)) calc(.5*var(--s)*0.577),
          repeating-conic-gradient(from 30deg,var(--c1) 0 60deg,var(--c2) 0 120deg,var(--c3) 0 180deg);
        background-size: var(--s) calc(var(--s)*0.577);
        /* 0.577 = tan(30deg)*/
      }
    </style>
  </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid" style="width: 90%;">
          <h3 class="navbar-brand" href="#">ContactsApp</h3>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
              @auth   
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="btn text-light">Cerrar sesión</button>
                </form>
              @endauth
            </div>
          </div>
        </div>
    </nav>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>