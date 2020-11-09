<div>
<main class="container clear"> 
    <div> 
      <div id="comments" >
      <br>
        <h2>EDITAR FUNCION</h2>
        <br>
        <h3><?= $film->getTitulo();?></h3>
        <br>
        <form action= "<?= FRONT_ROOT ?>Funcion/Edit" method="post">

        <input type="hidden" name="id" value=<?= $funcion->getId() ?> > 
          <input type="hidden" name="idFilm" value=<?= $funcion->getIdFilm() ?> > 

          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="room">Seleccionar la Sala</label>
              <select class="form-control" id="idSala" name="idSala" required>
              <?php 
                  foreach($rooms as $room) {
                    if($cinemaController->nombrePorId($room->getIdCine()) != ''){ 
              ?>
                <option value="<?php echo $room->getId() ?>"> <?php echo $cinemaController->nombrePorId($room->getIdCine()) . " - " .  $room->getNombre(); ?> </option>
                  <?php }} ?>
                  
                </select>
            </div>

            <div class="form-group col-md-4">
              <label for="fecha">Fecha</label>
              <input type="date" class="form-control" name="fecha" min= <?=date('Y-m-d')?> value="<?php echo $funcion->getFecha() ?>" required>
            </div>

          </div>
          
          <div class="form-row">

          <div class="form-group col-md-4">
            <label for="hora">Hora</label>
            <input type="time" class="form-control" name="hora" value="<?php echo $funcion->getHora() ?>" required>
            </div>
          <div class="form-group col-md-4">
            <label for="duracion">Duración en Minutos</label>
            <input type="number" class="form-control" name="duracion" value="<?php echo $funcion->getDuracion() ?>" readonly>
            </div>
          <div class="form-group col-md-4">
            <label for="duracion">Valor Entrada</label>
            <input type="number" class="form-control" name="valorEntrada" value="<?php echo $funcion->getValorEntrada() ?>" min="0" required>
            </div>
          </div>

          <input type="hidden" name="entradasVendidas" value=<?= $funcion->getEntradasVendidas() ?> > 


          <br>
          <button type="submit" class="btn btn-danger">Editar</button>
      </form>

            </div>
          </div>
        </main>
      </div>