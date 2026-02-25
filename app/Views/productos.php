<?php
$titulo = 'Productos';
$descripcion = 'Gestión de productos y precios';

include 'body.php';
?>


    <!-- CARD CREAR PRODUCTO -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white fw-semibold">
            Crear producto
        </div>

        <div class="card-body">
            <form action="/productos" method="post">

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Nombre</label>
                    <div class="col-sm-9">
                        <input
                            required
                            type="text"
                            class="form-control"
                            name="nombre"
                            placeholder="Ej: Café, Tornillo, Servicio técnico"
                        >
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Precio</label>
                    <div class="col-sm-9">
                        <input
                            required
                            type="number"
                            step="0.01"
                            class="form-control"
                            name="precio"
                            placeholder="Ej: 1500.00"
                        >
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success px-4">
                        Guardar producto
                    </button>
                </div>

            </form>
        </div>
    </div>
    

    <!-- TABLA PRODUCTOS -->
    <div class="card shadow-sm">
        <div class="card-header bg-light fw-semibold">
            Productos registrados
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-secondary">
                    <tr>
                        <th>Nombre</th>
                        <th class="text-end">Precio</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product->nombre); ?> </td>
                            <td class="text-end">$ <?= htmlspecialchars($product->precio, ENT_QUOTES); ?> </td>
                            <td class="text-center">

                                <a
                                    href="/productos/modificar"
                                    class="btn btn-sm btn-outline-primary me-2"
                                    value="<?= $product->id ?>"
                                >
                                    Editar
                                </a>

                                <form
                                    action="/productos/borrar"
                                    method="post"
                                    class="d-inline"
                                >
                                    <button
                                        type="submit"
                                        name="id"
                                        value="<?= $product->id ?>"
                                        class="btn btn-sm btn-outline-danger"
                                    >
                                        Eliminar
                                    </button>
                                </form>

                            </td>
                        </tr>
                        <?php endforeach ?>
                </tbody>

            </table>
        </div>
    </div>

</div>



<?php include 'footer.php'; ?>