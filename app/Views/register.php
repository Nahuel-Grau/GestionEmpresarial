<?php include 'head.php';?>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-5 col-lg-4">

            <div class="card shadow">
                <div class="card-body p-4">

                    <h3 class="text-center mb-4">Crear cuenta</h3>
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger text-center">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST" action="/register">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nombre" name="nombre"placeholder="nombre"required>
                            <label for="nombre">Nombre</label>
                        </div>

                        <!-- Email -->
                        <div class="form-floating mb-3">
                            <input type="email"class="form-control"id="email"name="email"placeholder="email"required>
                            <label for="email">Email</label>
                        </div>

                        <!-- Password -->
                        <div class="form-floating mb-3">
                            <input type="password"class="form-control"minlength="8"id="password"name="password"placeholder="password"required>
                            <label for="password">Contraseña</label>
                        </div>

                        <!-- Confirmar Password -->
                        <div class="form-floating mb-4">
                            <input type="password"class="form-control"minlength="8"id="password_confirmation"name="password_confirmation"placeholder="confirmar password"required>
                            <label for="password_confirmation">Confirmar contraseña</label>
                        </div>

                        <!-- Botones -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                Registrarse
                            </button>

                            <a href="/login" class="btn btn-outline-secondary">
                                Volver al login
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?php include 'footer.php';?>