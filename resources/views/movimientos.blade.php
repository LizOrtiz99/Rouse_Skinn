<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimientos de Mercancía</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.user/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lading-page/proveedores.css') }}">
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
            <li class="menu-button" id="usuarioButton"><a href="{{ route('articulos.index') }}">Administración de articulos</a></li></br>
            <li class="menu-button" id="proveedoresButton"><a href="{{ route('proveedores.index') }}">Administración de proveedores</a></li>
            <li class="menu-button" id="reportesButton">Reporte de existencias</li>
        </ul>
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
    <h1>Movimientos de Mercancía</h1>
    <form id="movimientosForm" action="{{ route('movimientos.store') }}" method="POST">
        @csrf
        <label for="articulo">Articulo:</label>
        <select id="articulo" name="articulo_id" required>
            @foreach ($articulos as $articulo)
                <option value="{{ $articulo->id }}">{{ $articulo->sku }}</option>
            @endforeach
        </select>
        <label for="categoria">Categoría:</label>
        <select id="categoria" name="categoria" required>
            <option value="Accesorios">Accesorios</option>
            <option value="Brochas">Brochas</option>
            <option value="Cejas">Cejas</option>
            <option value="Cuidado capilar">Cuidado capilar</option>
            <option value="Cuidado de la piel">Cuidado de la piel</option>
            <option value="Labios">Labios</option>
            <option value="Ojos">Ojos</option>
            <option value="Piel">Piel</option>
            <option value="Corporal">Corporal</option>
        </select>
        <label for="proveedor">Proveedor:</label>
        <select id="proveedor" name="proveedor_id" required>
            @foreach ($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}">{{ $proveedor->name }}</option>
            @endforeach
        </select>
        <label for="tipo">Tipo:</label>
        <select id="tipo" name="tipo" required>
            <option value="entrada">Entrada</option>
            <option value="salida">Salida</option>
        </select>
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" required><br>
        <button type="submit" class="menu-button">Guardar movimientos</button>
    </form>
</div>

    <script>
        window.onload = function() {
            const form = document.getElementById('movimientosForm');
            const cantidadInput = document.getElementById('cantidad');
            const fechaInput = document.getElementById('fecha');

            form.addEventListener('submit', function(event) {
                if (cantidadInput.value <= 0) {
                    alert('La cantidad debe ser mayor que cero');
                    event.preventDefault(); // Evita que el formulario se envíe
                }
        };
    </script>
</body>
</html>
