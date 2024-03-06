<!doctype html>
<html lang="en">
<head>
    <title>Sistema de gestión de inventarios</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />
    <Link rel="stylesheet" href="{{ asset('assets/estilo.css')}}">
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
                                    <img src="{{asset('assets/Logo_Rouse_Skin-removebg-preview.png')}}"
                                         style="width: 185px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">Registro de usuario</h4>
                                </div>

                                <form action="{{ route('register') }}" method="post" id="registro-form">
                                    @csrf
                                    
                                    <p>Ingresa tus datos</p>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="nombre" name="name" class="form-control"/>
                                        <label class="form-label" for="nombre">Nombre</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="email" id="email" name="email" class="form-control"/>
                                        <label class="form-label" for="email">Correo electrónico</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="password" name="password" class="form-control" />
                                        <label class="form-label" for="password">Contraseña</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="confirmPassword" name="password_confirmation" class="form-control" />
                                        <label class="form-label" for="confirmPassword">Confirmar contraseña</label>
                                    </div>

                                    <div id="error-message" class="alert alert-danger" style="display: none;">Por favor, complete todos los campos.</div>

                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <button type="submit" class="btn btn-outline-danger">Registrar usuario</button>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <a href="{{route('login')}}" class="btn btn-outline-danger">Volver</a>
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

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"
></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('registro-form').addEventListener('submit', function (event) {
            // Obtener los valores de los campos
            var nombre = document.getElementById('nombre').value.trim();
            var email = document.getElementById('email').value.trim();
            var password = document.getElementById('password').value.trim();
            var confirmPassword = document.getElementById('confirmPassword').value.trim();

            // Validar si algún campo está vacío
            if (nombre === '' || email === '' || password === '' || confirmPassword === '') {
                // Mostrar mensaje de error
                document.getElementById('error-message').style.display = 'block';
                // Detener el envío del formulario
                event.preventDefault();
            }
        });
    });
</script>

</body>
</html>
