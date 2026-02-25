<?php include 'head.php';
?>
<body class="bg-light">

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-5 col-lg-4">

            <div class="card shadow">
                <div class="card-body p-4">

                    <h3 class="text-center mb-4">Iniciar sesión</h3>
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger text-center">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST" action="/login">

                        <!-- Email -->
                        <div class="form-floating mb-3">
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                placeholder="email"
                                required
                            >
                            <label for="email">Email</label>
                        </div>

                        <!-- Password -->
                        <div class="form-floating mb-3">
                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="password"
                                required
                            >
                            <label for="password">Contraseña</label>
                        </div>

                        <!-- Recordarme -->
                        <div class="form-check mb-3">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="remember"
                                name="remember"
                            >
                            <label class="form-check-label" for="remember">
                                Recordarme
                            </label>
                        </div>

                        <!-- Botones -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                Iniciar sesión
                            </button>

                            <a href="/register" class="btn btn-outline-secondary">
                                Registrarse
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>




<?php include 'footer.php';?>