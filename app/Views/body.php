<?php include 'head.php'; ?>

<body class="bg-light">

<?php include 'navbar.php'; ?>


<div class="container mt-4">
    <!-- Título de sección -->
    <div class="mb-4">
        <h3 class="fw-semibold mb-1">
            <?= $titulo ?? 'Panel' ?>
        </h3>
        <?php if (!empty($descripcion)): ?>
            <p class="text-muted mb-0">
                <?= $descripcion ?>
            </p>
        <?php endif; ?>
    </div>