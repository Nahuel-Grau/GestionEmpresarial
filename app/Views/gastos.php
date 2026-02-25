<?php include 'body.php';
include_once __DIR__.'/../Controllers/GastoController.php';
?>
<div class="card">
    <div class="card-header">
         Gasto
        <div class="container">
            <form action="/gastos" method="post">
                <div class="mb-3 row">
                    <legend class="col-form-legend col-4">Descripción</legend>                    
                    <div class="col-8">
                        <input required type="text"class="form-control"name="descripcion"id="descripcion"placeholder="Descripción"/>
                    </div>
                </div>
                <fieldset class="mb-3 row">
                    <legend class="col-form-legend col-4">Monto</legend>
                    <div class="col-8">
                        <input required type="text"class="form-control"name="monto"placeholder="Monto"/>            
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
                <th scope="col">Fecha</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Gasto</th>
                <th scope="col">Eliminar</th>
                <th scope="col">Modificar</th>
            </tr>
        </thead>
        <tbody>
             <?php foreach ($gastos as $gasto): ?>
        <tr>
            <td><?= htmlspecialchars($gasto->fecha); ?></td>
            <td><?= htmlspecialchars($gasto->descripcion, ENT_QUOTES); ?></td>
            <td>$<?= number_format($gasto->monto, 2); ?></td>
            <form action="/gastos/borrar" method="post">
                <td><button type="submit" class="btn btn-danger" name="id" value="<?= $gasto->id ?>">Eliminar</button>
            </form> 
                 <td><a class="btn btn-primary" href="gastos/modificar?id=<?=$gasto->id?>" role="button" >modificar</a></td>
        </tr>
    <?php endforeach ?>
        <tr class=" bg-danger-subtle">
            <td class="fw-bold bg-danger-subtle">Gasto mensual</td>
            <td class="fw-bold bg-danger-subtle">$<?= number_format($total);?></td>
        </tr>
        </tbody>
    </table>
</div>




<?php include 'footer.php'; ?>