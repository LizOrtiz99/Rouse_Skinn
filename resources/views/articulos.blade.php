<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Artículos</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.user/styles.css') }}">
    <script src="https://kit.fontawesome.com/9a0335d8d3.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="menu-container" id="menu-container">
        <ul>
            <a class="house">
                <i class="fa-solid fa-house" style="color: #ffffff;"></i>
            </a><br>
            <li class="menu-button" id="homeButton"><a href="{{ route('home') }}">Menu Principal</a></li></br>
            <li class="menu-button" id="usuarioButton"><a href="{{ route('admin.users.index') }}">Administración de usuario</a></li></br>
            <li class="menu-button" id="proveedoresButton"><a href="{{ route('proveedores.index') }}">Administración de proveedores</a></li>
            <li class="menu-button" id="movimientosButton"><a href="{{ route('movimientos.index') }}">Movimientos de mercancía</a></li>
            <li class="menu-button" id="existenciasButton"><a href="{{ route('existencias.index') }}">Reporte de existencias</a></li></br>
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
        <h1>Administración de Artículos</h1>
        <a href="{{ route('createarticulos') }}" class="button-style">Agregar Nuevo Artículo</a><br>

        <!-- Barra de búsqueda -->
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Buscar por nombre..." onkeyup="filterArticles()">
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>SKU</th>
                    <th>Categoría</th>
                    <th>Proveedor</th>
                    <th>Lote</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="articleList">
                @foreach ($articulos as $articulo)
                <tr>
                    <td>{{ $articulo->nombre }}</td>
                    <td>{{ $articulo->sku }}</td>
                    <td>{{ $articulo->categoria }}</td>
                    <td>{{ $articulo->proveedor ? $articulo->proveedor->name : 'Sin proveedor' }}</td>
                    <td>{{ $articulo->lote }}</td>
                    <td>{{ $articulo->fecha_vencimiento }}</td>
                    <td>
                        <a href="{{ route('editarticulos', ['id' => $articulo->id]) }}" class="modifyButton">Modificar</a>
                        <form action="{{ route('articulos.destroy', $articulo->id) }}" method="POST" id="delete-form">
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
        if (confirm('¿Estás seguro de que deseas eliminar este artículo?')) {
            document.getElementById('delete-form').submit();
        }
    }

    function filterArticles() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("articleList");
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
