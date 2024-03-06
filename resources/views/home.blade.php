<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lading-page/styles.css') }}">
    <script src="https://kit.fontawesome.com/9a0335d8d3.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="title">
        <h1>Menú Principal</h1>
    </div>
    <div class="menu">
        <a class="house">
            <i class="fa-solid fa-house" style="color: #ffffff;"></i>
        </a>
        <ul>
            <li class="menu-button" id="usuarioButton"><a href="{{ route('admin.users.index') }}">Administración de usuario</a></li></br>
            <li class="menu-button" id="proveedoresButton"><a href="{{ route('proveedores.index') }}">Administración de proveedores</a></li></br>
            <li class="menu-button" id="usuarioButton"><a href="{{ route('articulos.index') }}">Administración de articulos</a></li></br>
            <li class="menu-button" id="movimientosButton"><a href="{{ route('movimientos.index') }}">Movimientos de mercancía</a></li></br>
            <li class="menu-button" id="existenciasButton"><a href="{{ route('existencias.index') }}">Reporte de existencias</a></li></br>
            <img src="{{asset('assets/Logo_Rouse_Skin-removebg-preview.png')}}" style="width: 185px;" alt="logo"></br>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Cerrar Sesión</button>
            </form>
        </ul>   
        <a class="minus">
            <i class="fa-solid fa-minus" style="color: #ffffff;"></i>
        </a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Agregar evento clic al ícono de la casa para mostrar/ocultar el menú
            document.getElementById('menuToggle').addEventListener('click', function () {
                document.querySelector('.menu').classList.toggle('active');
            });

            // Redireccionar al hacer clic en los elementos del menú
            document.querySelectorAll('.menu-button').forEach(function (element) {
                element.addEventListener('click', function (event) {
                    event.preventDefault(); // Evitar comportamiento predeterminado del enlace
                    window.location.href = this.querySelector('a').getAttribute('href'); // Redirigir a la URL especificada en el enlace
                });
            });
        });
    </script>
</body>
</html>
