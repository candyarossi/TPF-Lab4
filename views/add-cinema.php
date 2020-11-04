
<div>
<main class="container clear"> 
    <div> 
      <div id="comments" >
      <br>
        <h2>AGREGAR CINE</h2>
        <br>
        <form action= "<?= FRONT_ROOT ?>Cinema/Add" method="post">
  <div class="form-row">
  
    <div class="form-group col-md-12">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" name="nombre" placeholder="" pattern="[A-Za-z0-9\s]+" title="Únicamente letras y números" required>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-8">
    <label for="calle">Calle</label>
    <input type="text" class="form-control" name="calle" placeholder="" pattern="[A-Za-z\s]+" title="Únicamente letras" required>
  </div>
  <div class="form-group col-md-4">
    <label for="altura">Altura</label>
    <input type="number" class="form-control" name="altura" placeholder="" min="0" max="9999" required>
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="horaApertura">Hora de Apertura</label>
    <input type="time" class="form-control" name="horaApertura" required>
    </div>
    <div class="form-group col-md-6">
    <label for="horaCierre">Hora de Cierre</label>
    <input type="time" class="form-control" name="horaCierre" required>
    </div>

  </div>
  <br>
 
  <button type="submit" class="btn btn-danger">Agregar</button>
</form>

      </div>
    </div>
  </main>
</div>


