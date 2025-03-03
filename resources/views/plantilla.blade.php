<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabajadores</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-r from-purple-600 to-pink-400 min-h-screen flex flex-col">

<header class="lg:px-16 px-4 bg-white flex flex-wrap items-center py-4 shadow-md">
    <div class="flex-1 flex justify-between items-center">
        <a href="{{ route('trabajadores.index') }}" class="text-xl font-bold text-purple-700">Capytrabajadores</a>
    </div>

    <label for="menu-toggle" class="pointer-cursor md:hidden block">
      <svg class="fill-current text-gray-900"
        xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
        <title>menu</title>
        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
      </svg>
    </label>
    <input class="hidden" type="checkbox" id="menu-toggle" />

    <div class="hidden md:flex md:items-center md:w-auto w-full" id="menu">
        <nav>
            <ul class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0">
                <li><a class="md:p-4 py-3 px-0 block hover:text-purple-600" href="{{ route('trabajadores.index') }}">Lista Trabajadores</a></li>
                <li><a class="md:p-4 py-3 px-0 block hover:text-purple-600" href="{{ route('trabajadores.create') }}">Crear nuevo trabajador</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="flex-grow p-6">
    @yield('contenido')
</main>

<footer class="bg-white shadow-md py-4 text-center text-gray-600">
    <p>&copy; {{ date('Y') }} Capytrabajadores. Todos los derechos reservados.</p>
</footer>

</body>
</html>
