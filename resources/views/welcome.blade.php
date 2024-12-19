<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/adminlte/dist/css/styles.css" />
    <title>NexusCoop</title>
</head>
<body>
<nav>
    <div class="nav__logo"><a href="#">NexusCoop</a></div>
    <ul class="nav__links">
        <li class="link">
            @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                        <a href="{{ url('/home') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">Registrar</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </li>
    </ul>
</nav>

<section class="container">
    <div class="content__container">
        <h1>
            NexusCoop<br />
            <span class="heading__1">Conexion para</span><br />
            <span class="heading__2">el progreso colectivo</span>
        </h1>
        <p>
        NexusCoop es una plataforma integral de gestión para cooperativas, brindando herramientas 
        para administrar personas, clientes y empleados, generando reportes detallados, gestionando 
        préstamos, cuentas y movimientos con eficiencia y precisión.
        </p>
    </div>
    <div class="image__container">
        <img src="vendor/adminlte/dist/img/logo.png" alt="header" />
        <img src="vendor/adminlte/dist/img/coop2.png" alt="header" />
        
    </div>
</section>
</body>
</html>