<?php 

include 'body.php';
?>
<div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><a href="/gastos">Gastos</a></h5>
        <p class="card-text fw-bold" >$<?= number_format($total);?>
</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Ingresos</h5>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
</div>

<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">ventas</h5>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">reportes</h5>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">productos</h5>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
</div>


<?php include 'footer.php'; ?>