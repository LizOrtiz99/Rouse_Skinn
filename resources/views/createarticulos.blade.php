<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Artículo</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.user/styles.css') }}">
    <script src="https://kit.fontawesome.com/9a0335d8d3.js" crossorigin="anonymous"></script>
    <style>
        /* Estilos CSS */
        @import url('https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Mooli&family=PT+Sans+Narrow&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #fedadc;
            font-family: 'Mooli', sans-serif;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center; /* Centrar contenido */
        }

        .form-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-container form {
            display: flex;
            flex-direction: column;
        }

        .form-container label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        .form-container input[type="text"],
        .form-container input[type="date"],
        .form-container select {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button[type="submit"],
        .form-container .menu-button a {
            background-color: #ffacb4; /* Color rosa similar al usado anteriormente */
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            width: 100%;
            margin-top: 20px;
            font-family: 'Archivo Narrow', sans-serif; /* Fuente similar a la usada anteriormente */
            font-size: 16px; /* Tamaño de fuente ajustado */
        }

        .form-container button[type="submit"]:hover,
        .form-container .menu-button a:hover {
            background-color: #ff89a0; /* Color rosa claro al hacer hover */
        }

        .form-container img {
            width: 185px;
            margin: 0 auto 20px;
            display: block;
        }

        .form-container .menu-button a {
            display: block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Crear Nuevo Artículo</h1>
        <form id="articuloForm" action="{{ route('articulos.store') }}" method="POST" onsubmit="return validarFormulario()">
            @csrf
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="sku">SKU:</label>
            <input type="text" id="sku" name="sku" required>
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
            <label for="lote">Lote:</label>
            <input type="text" id="lote" name="lote" required>
            <label for="fecha_vencimiento">Fecha de vencimiento:</label>
            <input type="date" id="fecha_vencimiento" name="fecha_vencimiento" required>
            <img src="{{asset('assets/Logo_Rouse_Skin-removebg-preview.png')}}" style="width: 185px;" alt="logo"></br>
            <button type="submit" class="btn btn-primary">Agregar</button>
            <div class="menu-button">
                <a href="{{ route('articulos.index') }}" class="btn btn-primary">Volver</a>
            </div>
        </form>
    </div>

    <script>
        function validarFormulario() {
            var nombre = document.getElementById('nombre').value;
            var sku = document.getElementById('sku').value;
            var categoria = document.getElementById('categoria').value;
            var proveedor = document.getElementById('proveedor').value;
            var lote = document.getElementById('lote').value;
            var fechaVencimiento = document.getElementById('fecha_vencimiento').value;

            if (nombre === "" || sku === "" || categoria === "" || proveedor === "" || lote === "" || fechaVencimiento === "") {
                alert("Por favor completa todos los campos.");
                return false;
            }
            
            return true;
        }
    </script>
</body>
</html>
