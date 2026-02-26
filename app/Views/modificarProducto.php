<?php 
include_once __DIR__.'/../Controllers/ProductController.php';
$titulo = "Producto: ".$product->nombre;
$descripcion = "Modificar producto";
include 'body.php';

?>

<div class="card">
    <div class="card-header">
         Modificar producto número: <?= $product->id ?>
        <div class="container">
            <form action="/gastos/actualizar" method="post">
                <input type="hidden" name="id" value="<?= $product->id ?>">
                <div class="mb-3 row">
                    <legend class="col-form-legend col-4">Nombre</legend>                    
                    <div class="col-8">
                        <input required type="text"class="form-control"name="descripcion"id="descripcion"value="<?= $product->nombre;?>"/>
                    </div>
                </div>
                <fieldset class="mb-3 row">
                    <legend class="col-form-legend col-4">Precio</legend>
                    <div class="col-8">
                        <input required type="text"class="form-control"name="monto"value="<?= $product->precio;?>">          
                    </div>
                </fieldset>
                <div class="mb-3 row">
                    <div class="offset-sm-4 col-sm-8">
                        <button type="submit" class="btn btn-primary">
                            Modificar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>