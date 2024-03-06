<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de usuarios</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lading-page/users.css') }}">
    <script src="https://kit.fontawesome.com/9a0335d8d3.js" crossorigin="anonymous"></script>
    <style>
        /* Estilos para el filtro de búsqueda */
        #searchInput {
            margin-bottom: 10px;
            padding: 5px;
            width: 200px;
        }
    </style>
</head>
<body>
    <div class="menu-container" id="menu-container">
        <ul>
            <a class="house">
                <i class="fa-solid fa-house" style="color: #ffffff;"></i>
            </a><br>
            <li class="menu-button" id="homeButton"><a href="{{ route('home') }}">Menu Principal</a></li></br>
            <li class="menu-button" id="proveedoresButton"><a href="{{ route('proveedores.index') }}">Administración de proveedores</a></li>
            <li class="menu-button" id="usuarioButton"><a href="{{ route('articulos.index') }}">Administración de usuario</a></li></br>
            <li class="menu-button" id="movimientosButton"><a href="{{ route('movimientos.index') }}">Movimientos de mercancía</a></li>
            <li class="menu-button" id="existenciasButton"><a href="{{ route('existencias.index') }}">Reporte de existencias</a></li></br>
        </ul>
        <img src="{{asset('assets/Logo_Rouse_Skin-removebg-preview.png')}}" style="width: 185px;" alt="logo">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Cerrar Sesión</button>
        </form>

        <a class="minus">
            <i class="fa-solid fa-minus" style="color: #ffffff;"></i>
        </a>
    </div>

    <div class="form-container" id="form-container">
        <h1>Usuarios registrados</h1>
        <!-- Agregar el campo de búsqueda -->
        <input type="text" id="searchInput" placeholder="Buscar usuarios...">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Modificar</a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // Función para filtrar usuarios
        function filterUsers() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementsByClassName("table")[0];
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0]; // Filtrar por la primera columna (nombre)
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        // Agregar evento de escucha al campo de búsqueda
        document.getElementById("searchInput").addEventListener("keyup", filterUsers);
    </script>
</body>
</html>
