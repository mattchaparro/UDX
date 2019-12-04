<div class="modal fade" id="modalPregunta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crea tu pregunta</h5>
        <button type="button" id="cerrarModal1" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_crear_pregunta" action="index.php?pid=<?php echo base64_encode("ui/sessionEstudiante.php")?>" method="post" enctype="multipart/form-data">
             <div class="form-group">
                <input type="text" class="form-control" id="id_pregunta" hidden>
             </div>
             <div class="form-group">
                <label for="titulo_pregunta">Titulo</label>
                <input type="text" class="form-control" id="titulo_pregunta" name="titulo_pregunta">
                <div id="msTitulo"></div>
             </div>
             <div class="form-group">
                <label for="descripcion_pregunta">Descripcion</label>
                <textarea id="descripcion_pregunta" class="form-control" cols="30" rows="10" name="descripcion_pregunta"></textarea>
                <div id="msDescripcion"></div>
             </div>
             <div class="form-group">
                <label for="anexo_pregunta">Anexo</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="anexo_pregunta" id="anexo_pregunta" aria-describedby="inputGroupFileAddon01">
                    <div id="msAnexo"></div>
                    <div id="msAnexo"></div>
                    <label class="custom-file-label">Seleccione un archivo</label>
                </div>
             </div>
             <label for="etiqueta_pregunta">Etiqueta(s)</label>
             <div class="form-group row px-3">
                  <input id="idEtiqueta" type="hidden" class="form-control">
                  <div class="col-9 px-0">
                      <input type="text" class="form-control" id="etiqueta_pregunta" placeholder="Agrega una o mas etiquetas" autocomplete="off">
                      <div id="msEtiquetas"></div>
                      <div id="etiquetas"></div>
                 </div>
                 <div class="col-3 px-0">
                  <button type="button" class="btn btn-primary btn-block" id="agregarEtiqueta">Agregar</button>
                 </div>
             </div>
             <div class="form-group">
                <div id="etiquetasPregunta"></div>
             </div>

            <label for="etiqueta_pregunta">Asignatura</label>
            <div class="form-group row px-3">
                  <input id="idAsignatura" type="hidden" name="asignatura_pregunta" class="form-control">
                  <div class="col-11 px-0">
                       <input type="text" class="form-control" id="asignatura_pregunta" placeholder="Busca una asignatura" autocomplete="off">
                       <div id="asignaturas"></div>
                       <div id="msAsignatura"></div>
                  </div>
                 <div class="col-1 my-auto">
                    <i class="fas fa-search"></i>
                 </div>
             </div>
             <div class="modal-footer">
               <button type="button" id="cerrarModal2" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
               <button type="submit" id="enviarPregunta" name="crearPregunta"class="btn btn-primary">Preguntar</button>
               <input type="hidden" name="idf" value="<?php echo md5(time())?>">
             </div>
        </form>
      </div>
    </div>
  </div>
</div>