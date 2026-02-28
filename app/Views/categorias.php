<?php ?>

<?php include 'body.php';
include_once __DIR__.'/../Controllers/CategoryController.php';
?>
<div class="card">
    <div class="card-header">
         Categorias
        <div class="container">
            <form action="/categorias" method="post">
                <div class="mb-3 row">
                    <legend class="col-form-legend col-4">Nombre</legend>                    
                    <div class="col-8">
                        <input required type="text"class="form-control"name="descripcion"id="descripcion"placeholder="Descripción"/>
                    </div>
                </div>
                <fieldset class="mb-3 row">
                    <legend class="col-form-legend col-4">tipo</legend>
                    <div class="col-8">
                        <select name="categoria_id" class="form-select" required>
                            <option value="">Seleccionar categoría</option>
                                <option value="Gasto">Gasto</option>
                                <option value="inversion">Inversion</option>
                                <option value="inversion">Ingreso</option>
                        </select>
                    </div>
                </fieldset>
                <div class="mb-3 row">
                    <div class="offset-sm-4 col-sm-8">
                        <button type="submit" class="btn btn-primary">
                            Enviar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div
    class="table-responsive"
>
    <table
        class="table table-primary"
    >
        <thead>
            <tr>
                Gastos
                <th scope="col">Nombre</th>
                <th scope="col">Tipo</th>
                <th scope="col">Eliminar</th>
                <th scope="col">Modificar</th>
            </tr>
        </thead>
        <tbody>
             <?php foreach ($category as $category): ?>
        <tr>
            <td><?= htmlspecialchars($category->nombre, ENT_QUOTES); ?></td>
            <td><?= htmlspecialchars($category->tipo ?? 'Sin categoría'); ?></td>
            <form action="/categorias/borrar" method="post">
                <td><button type="submit" class="btn btn-danger" name="id" value="<?= $category->id ?>">Eliminar</button>
            </form> 
                 <td><a class="btn btn-primary" href="categorias/modificar?id=<?=$category->id?>" role="button" >modificar</a></td>
        </tr>
    <?php endforeach ?>
    
        </tbody>
    </table>
</div>




<?php include 'footer.php'; ?>