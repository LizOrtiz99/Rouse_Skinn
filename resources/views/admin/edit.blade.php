<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lading-page/edit.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.user/styles.css') }}"> <!-- Agrega el enlace al archivo CSS -->

    <style>
        /* Estilos CSS */
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

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .container form {
            display: flex;
            flex-direction: column;
        }

        .container label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        .container input[type="text"],
        .container input[type="date"],
        .container select {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .container button[type="submit"],
        .container .menu-button a {
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

        .container button[type="submit"]:hover,
        .container .menu-button a:hover {
            background-color: #ff89a0;
        }

        .container img {
            width: 185px;
            margin: 0 auto 20px;
            display: block;
        }

        .menu-button {
            text-align: center; /* Centrar el botón dentro del contenedor */
        }

        /* Estilos para los mensajes de error */
        .error-message {
            color: red;
            margin-top: 5px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Editar Usuario</h1>

    <form id="editUserForm" action="{{ route('user.update', $user->id) }}" method="POST" onsubmit="return validateForm()">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}">
            <div id="nameError" class="error-message"></div>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}">
            <div id="emailError" class="error-message"></div>
        </div>
        
        <img src="{{asset('assets/Logo_Rouse_Skin-removebg-preview.png')}}" style="width: 185px;" alt="logo">
        <button type="submit" class="btn btn-primary">Guardar cambios</button> 
        <div class="menu-button">
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </form>
</div>

<script>
    function validateForm() {
        // Variables para los campos del formulario
        var nameInput = document.getElementById('name');
        var emailInput = document.getElementById('email');

        // Variables para los mensajes de error
        var nameError = document.getElementById('nameError');
        var emailError = document.getElementById('emailError');

        // Variable para el estado de validación
        var isValid = true;

        // Validación del campo de nombre
        if (nameInput.value.trim() === '') {
            nameError.textContent = 'Por favor, ingresa un nombre.';
            isValid = false;
        } else {
            nameError.textContent = '';
        }

        // Validación del campo de email
        if (emailInput.value.trim() === '') {
            emailError.textContent = 'Por favor, ingresa un email.';
            isValid = false;
        } else if (!isValidEmail(emailInput.value.trim())) {
            emailError.textContent = 'Por favor, ingresa un email válido.';
            isValid = false;
        } else {
            emailError.textContent = '';
        }

        return isValid;
    }

    // Función para validar el formato de email
    function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
</script>

</body>
</html>
