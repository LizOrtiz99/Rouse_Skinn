<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar proveedor</title>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Mooli&family=PT+Sans+Narrow&display=swap" rel="stylesheet">
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
        .form-container input[type="email"] {
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
            font-size: 16px;
            display: block;
            width: 100%;
            margin-top: 20px;
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
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Modificar proveedor</h1>
        <form action="{{ route('proveedores.update', ['id' => $proveedor->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Nombre:</label>
            <input type="text" name="name" value="{{ $proveedor->name }}" required>
            <label for="tax_identification_number">Número de identificación tributaria:</label>
            <input type="text" name="tax_identification_number" value="{{ $proveedor->tax_identification_number }}" required>
            <label for="number">Teléfono:</label>
            <input type="text" name="number" value="{{ $proveedor->number }}" required>
            <label for="email">Correo:</label>
            <input type="email" name="email" value="{{ $proveedor->email }}" required><br>
            <img src="{{asset('assets/Logo_Rouse_Skin-removebg-preview.png')}}" style="width: 185px;" alt="logo"></br>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
            <div class="menu-button">
                <a href="{{ route('proveedores.index') }}" class="btn btn-primary">Volver</a>
            </div>
        </form>
    </div>
</body>
</html>
