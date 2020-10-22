
<div>
<main class="container clear"> 
    <div> 
      <div id="comments" >
      <br>
        <h2>AGREGAR SALA</h2>
        <br>
        <form action= "<?= FRONT_ROOT ?>Cinema/AddRoom" method="post">

  <div class="form-row">

  <div class="form-group col-md-12">
    <label for="cinema">Seleccione el Cine</label>
    <select class="form-control" id="cinema" name="cinema" required>

    <?php 
        foreach($cinemaList as $cinema) {
    ?>
      <option value="<?php echo $cinema->getId(); ?>"><?php echo $cinema->getNombre(); ?></option>

        <?php } ?>
    </select>
  </div>
</div>
  <div class="form-row">
    <div class="form-group col-md-8">
    <label for="nombreSala">Nombre</label>
    <input type="text" class="form-control" name="nombre" required>
    </div>
    <div class="form-group col-md-4">
    <label for="capacidad">Capacidad</label>
    <input type="number" class="form-control" name="capacidad" required>
    </div>
  </div>
  <br>
  <button type="submit" class="btn btn-danger">Agregar</button>
</form>

      </div>
    </div>
  </main>
</div>