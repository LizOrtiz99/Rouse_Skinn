<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Artículo</title>
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
            background-color: #ffacb4;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-align: center;
            text-decoration: none;
            font-size: 16px; /* Tamaño de fuente ajustado */
            display: block;
            width: 100%; /* Ancho completo */
        }

        .form-container button[type="submit"]:hover,
        .form-container .menu-button a:hover {
            background-color: #ff89a0;
        }

        .form-container img {
            width: 185px;
            margin: 0 auto 20px;
            display: block;
        }

        .menu-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Editar Artículo</h1>
        <form action="{{ route('articulos.update', ['id' => $articulo->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ $articulo->nombre }}" required>
            <label for="sku">SKU:</label>
            <input type="text" id="sku" name="sku" value="{{ $articulo->sku }}" required>
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
            <label for="lote">Lote:</label>
            <input type="text" id="lote" name="lote" value="{{ $articulo->lote }}" required>
            <label for="fecha_vencimiento">Fecha de vencimiento:</label>
            <input type="date" id="fecha_vencimiento" name="fecha_vencimiento" value="{{ $articulo->fecha_vencimiento }}" required>
            <img src="{{ asset('assets/Logo_Rouse_Skin-removebg-preview.png') }}" style="width: 185px;" alt="logo"></br>
            <button type="submit" class="btn btn-primary">Actualizar Artículo</button>
        </form>
        <div class="menu-button">
            <a href="{{ route('articulos.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</body>
</html>
