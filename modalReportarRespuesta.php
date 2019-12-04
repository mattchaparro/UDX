<?php
    $causal = new Causal();
    $causales = $causal -> selectAll();
?>
 <div class="modal fade" id="modalRepRespuesta" tabindex="-#modalRepPublicacion" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¡Notificar abuso!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Escoge la razon po la cual quieres notificar esta publicacion</p>
           <form id="form_reporte">
           <?php
             foreach($causales as $c){
            ?>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="causalRes" id="causal" value="<?php echo $c -> getIdCausal() ?>">
              <label class="form-check-label" for="exampleRadios1">
                <?php echo $c -> getDescripcion() ?>
              </label>
            </div>
            <?php
             }
           ?> 
           </form>
            <div class="alert mt-2" role="alert" id="msReporte"></div>
            <hr>
            <p class="mt-2 text-justify">Al notificar las publicaciones que hacen los demas usuarios, nos estas ayudando a que el sitio funcione de una manera adecuada y con el proposito por el cual fue creado. Cuando nos notificas algun "problema" que has encontrado, lo validareamos posteriormente para tomar medidas al respecto.</p>
            <p><i>¡Recuerda que juntos hacemos que esta comunidad funcione!</i></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="enviarNotificacionRes">Enviar notificacion</button>
      </div>
    </div>
  </div>
</div>