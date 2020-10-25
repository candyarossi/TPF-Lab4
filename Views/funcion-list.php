<div>
  <main class="hoc container clear"> 
    <!-- main body -->
    <div>
<br>
    <h2>LISTADO DE FUNCIONES</h2>
<br>
      <div>

      <form method="post">
      <?php foreach ($films as $film){
        ?>
      <h5><?php echo $film->getTitulo(); ?></h5><br>
      <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Sala</th>
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
      <th scope="col">Duraci&oacute;n</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>   
  <?php foreach ($funcionList as $funcion){ 
        if($funcion->getIdFilm() == $film->getId()){
            $room = $this->roomDAO->GetOne($funcion->getIdSala());
    ?>
            <tr>
              <td> <?php echo $cinemaDAO->nombrePorId($room->getIdCine()) . ' - ' . $room->getNombre(); ?> </td>
              <td> <?php echo $funcion->getFecha(); ?> </td>
              <td> <?php echo $funcion->getHora(); ?> </td>
              <td> <?php echo $funcion->getDuracion(); ?> </td>
              <td>
                <button type="submit" name='edit' class="btn btn-danger" value="<?php echo $funcion->getId(); ?>" formaction="<?php FRONT_ROOT ?>../Funcion/ShowEditView"> Editar </button>
                <button type="submit" name='remove' class="btn btn-secondary" value="<?php echo $funcion->getId(); ?>" formaction="<?php FRONT_ROOT ?>../Funcion/Remove"> Eliminar </button> 
              </td>
            </tr>

            <?php } } ?>
  </tbody>
</table>
<hr><br>
<?php } ?><br>
</form> 
      </div>
    </div>
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>