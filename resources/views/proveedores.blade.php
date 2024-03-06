<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Proveedores</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.user/styles.css') }}">
    <script src="https://kit.fontawesome.com/9a0335d8d3.js" crossorigin="anonymous"></script>
    <style>
        .search-container {
            margin-bottom: 0px; /* Ajustar el margen inferior para separar la barra de búsqueda de la tabla */
        }

        #searchInput {
            width: 100%; /* Hacer que la barra de búsqueda ocupe todo el ancho disponible */
            padding: 10px; /* Ajustar el relleno para una apariencia más equilibrada */
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
            <li class="menu-button" id="usuarioButton"><a href="{{ route('admin.users.index') }}">Administración de usuario</a></li></br>
            <li class="menu-button" id="usuarioButton"><a href="{{ route('articulos.index') }}">Administración de articulos</a></li></br>
            <li class="menu-button" id="movimientosButton"><a href="{{ route('movimientos.index') }}">Movimientos de mercancía</a></li>
            <li class="menu-button" id="existenciasButton"><a href="{{ route('existencias.index') }}">Reporte de existencias</a></li>
        </ul>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lading-page/proveedores.css') }}">
        <ul>
        <img src="{{asset('assets/Logo_Rouse_Skin-removebg-preview.png')}}" style="width: 185px;" alt="logo">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Cerrar Sesión</button>
        </form>
        </ul>
        <a class="minus">
            <i class="fa-solid fa-minus" style="color: #ffffff;"></i>
        </a>
    </div>

    <div class="form-container" id="form-container">
        <h1>Administración de Proveedores</h1>
        <a href="{{ route('createproovedores') }}" class="button-style">Agregar Nuevo Proveedor</a><br>

        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Buscar por nombre..." onkeyup="filterProviders()">
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Número de identificación tributaria</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="providerList">
                @foreach ($proveedores as $proveedor)
                <tr>
                    <td>{{ $proveedor->name }}</td>
                    <td>{{ $proveedor->tax_identification_number }}</td>
                    <td>{{ $proveedor->number }}</td>
                    <td>{{ $proveedor->email }}</td>
                    <td>
                        <a href="{{ route('editproveedores', ['id' => $proveedor->id]) }}" class="modifyButton">Modificar</a>
                        <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" id="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" onclick="confirmDelete()">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
    function confirmDelete() {
        if (confirm('¿Estás seguro de que deseas eliminar este proveedor?')) {
            document.getElementById('delete-form').submit();
        }
    }

    function filterProviders() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("providerList");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
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
    </script>

</body>
</html>
