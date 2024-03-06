<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <!-- Enlaces a CSS y otros recursos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/estilo.css')}}">
    <style>
        .error-msg {
            color: red;
        }
    </style>
</head>
<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <img src="{{asset('assets/Logo_Rouse_Skin-removebg-preview.png')}}" style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">¡Bienvenido!</h4>
                                    </div>
                                    <form id="login-form" action="{{route('login')}}" method="post">
                                        @csrf
                                        <p>Inicio de sesión</p>
                                        <div class="form-outline mb-4">
                                            <input type="email" id="email" name="email" class="form-control" required/>
                                            <label class="form-label" for="email">Correo electrónico</label>
                                            @error('email')
                                                <div class="error-msg">El correo electrónico o la contraseña son incorrectos.</div>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="password" name="password" class="form-control" required/>
                                            <label class="form-label" for="password">Contraseña</label>
                                            @error('password')
                                                <div class="error-msg">El correo electrónico o la contraseña son incorrectos.</div>
                                            @enderror
                                        </div>

                                        <div class="error-msg" id="error-msg" style="display: none;"></div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button" onclick="validateLoginForm()">Iniciar sesión</button>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <a href="{{route('register')}}" class="btn btn-outline-danger">Registrar</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">© 2023 Sistema de Gestión de Inventarios RS. </h4>
                                    <p class="small mb-0">Todos los derechos reservados.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script>
        function validateLoginForm() {
            var email = document.getElementById('email').value.trim();
            var password = document.getElementById('password').value.trim();
            var errorMsg = document.getElementById('error-msg');

            if (email === '' || password === '') {
                errorMsg.textContent = 'Por favor, complete todos los campos.';
                errorMsg.style.display = 'block';
            } else {
                // Envía el formulario si la validación es exitosa
                document.getElementById('login-form').submit();
            }
        }
    </script>
</body>
</html>
