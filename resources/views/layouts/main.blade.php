<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/headers.css" rel="stylesheet">
    <title>MyIntern</title>
</head>

<body class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary  mb-3">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a href="" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none mx-2">
                    {{-- <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg> --}}
                    <img src="{{url('/images/myintern.png')}} " width="40" height="32" alt="">
                </a>
                <a class="navbar-brand" href="#">MyIntern</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/')?'active':'' }}" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('about*')?'active':'' }}" aria-current="page" href="/about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('syarat-ketentuan*')?'active':'' }} " aria-current="page" href="/syarat-ketentuan">Syarat & Ketentuan</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a href="/login" class="btn btn-warning  mx-2">Masuk</a>
                    <a href="/registrasi" class="btn btn-outline-light ">Daftar</a>
                    {{-- <button class="btn btn-outline-light mx-2" type="submit">Masuk</button>
                    <button class="btn btn-warning" type="submit">Registrasi</button> --}}
                </form>
            </div>
        </div>
    </nav>
        <main class="flex-shrink-0">
        @yield('body')
    </main>
<footer class="footer mt-auto py-3 p-2 d-flex flex-wrap bg-dark text-white justify-content-between">
    
    <p class="col-md-4 mb-0 my-2 text-muted">&copy; 2021 MyIntern, Inc</p>
        
            <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                
                <img src="{{url('/images/myintern.png')}}" class="bi me-2" width="40" height="32" alt="">
            </a>
        
            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="/login" class="nav-link px-2 text-muted">Masuk</a></li>
                <li class="nav-item"><a href="/registrasi" class="nav-link px-2 text-muted">Daftar</a></li>
                <li class="nav-item"><a href="/FQA" class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a href="/about" class="nav-link px-2 text-muted">About Us</a></li>
            </ul>
  </footer>
        {{-- <div class="container mt-5 mb-5"><div class="row mt-5">&nbsp;</div><div class="row mt-5">&nbsp;</div></div> --}}
    
        {{-- <footer class="d-flex flex-wrap justify-content-between footer align-items-center py-3 mt-5 bg-dark text-white border-top sticky-lg-bottom">
            <p class="col-md-4 mb-0 text-muted">&copy; 2021 MyIntern, Inc</p>
        
            <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                
                <img src="{{url('/images/myintern.png')}}" class="bi me-2" width="40" height="32" alt="">
            </a>
        
            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>
        </footer> --}}
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>