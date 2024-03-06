<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de existe</title>
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
            <li class="menu-button" id="movimientosButton"><a href="{{ route('movimientos.index') }}">Movimientos de mercancía</a></li>
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

    <div class="content-container">
        <div class="form-container" id="form-container" style="width: 1470px; padding: 100px;">
            <h1>Reporte de Existencias</h1>
            <form action="{{ route('movimientos.store') }}" method="POST">
                @csrf
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
                        @foreach ($proveedor as $proveedores)
                            <option value="{{ $proveedores->id }}">{{ $proveedores->name }}</option>
                        @endforeach
                    </select>
                <button class="menu-button">Generar Reporte</button>
            </form>
        </div>
    </div>
</body>
</html>
