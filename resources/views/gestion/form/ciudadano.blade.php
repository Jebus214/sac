

<div id="form-modal-ciudadano" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <!-- <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button> -->
            <h4 class="modal-title" id="myModalLabel">SAC</h4>
          </div>
          <div class="modal-body">


            <div class="enviar-modal">
           <form id="form-edit-ciudadano" role="form" class="form-horizontal">
            <div class="form-group"> 
              <label class="control-label col-sm-offset-2 col-sm-2">Número de Folio</label>
            <div class="col-sm-6">
              <input type="text" id="no_folio" name="no_folio" class="form-control" placeholder="Número de Folio"> 
            </div>
          </div>
            <div class="form-group"> 
              <label class="control-label col-sm-offset-2 col-sm-2">Número de Oficio</label>
              <div class="col-sm-6">
                <input type="text" id="no_oficio" name="no_oficio" class="form-control" placeholder="Número de Oficio">
              </div> 
          </div>
            <div class="form-group"> 
              <label class="control-label col-sm-offset-2 col-sm-2">Remitente</label>
              <div class="col-sm-6">
                <input type="text" id="remitente_c" name="remitente_c" class="form-control" placeholder="Remitente">
              </div> 
          </div>
          <div class="form-group"> 
            <label class="control-label col-sm-offset-2 col-sm-2">Remitente</label>
              <div class="col-sm-6">
                <input type="text" id="remitente_e" name="remitente_e" class="form-control" placeholder="Remitente">
              </div> 
          </div>
          <div class="form-group"> 
            <label class="control-label col-sm-offset-2 col-sm-2">Remitente</label>
              <div class="col-sm-6">
                <select type="text" id="remitente_id" name="remitente_id" class="form-control" placeholder="Remitente">
                </select>
              </div> 
          </div>
          <div class="form-group"> 
            <label class="control-label col-sm-offset-2 col-sm-2">Destinatario</label>
              <div class="col-sm-6">
                <select type="text" id="destinatario_id" name="destinatario_id" class="form-control" placeholder="Destinatario">
                </select>
              </div> 
          </div>
            <div class="form-group"> 
              <label class="control-label col-sm-offset-2 col-sm-2">Dependencia</label>
              <div class="col-sm-6">
                <input type="text" id="dependencia_e" name="text" class="form-control" placeholder="Dependencia">
              </div> 
          </div>
            <div class="form-group"> 
              <label class="control-label col-sm-offset-2 col-sm-2">Fecha de emisión</label>
              <div class="col-sm-6">
                <input type="date" id="fecha_emision" name="fecha_emision" class="form-control" placeholder="Fecha de emisión">
              </div> 
          </div>
            <div class="form-group"> 
              <label class="control-label col-sm-offset-2 col-sm-2">Asunto</label>
              <div class="col-sm-6">
                <input type="text" id="asunto" name="asunto" class="form-control" placeholder="Asunto">
              </div> 
          </div>

          <div class="form-group"> 
            <label class="control-label col-sm-offset-2 col-sm-2">Archivo</label>
              <div class="col-sm-6">
                <input type="file" id="archivo" name="archivo" class="form-control" placeholder="Subir Archivo">
              </div> 
          </div>
          

            <button id="guardar" class="btn btn-primary col-sm-offset-8 col-sm-2">Guardar Cambios</button>
          
          </form>

            </div>



            <div  class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Tus cambios han sido guardados</strong>
            </div>

          </div>
          <div class="modal-footer">
              <button id="test-regresar-btn" type="button" class="btn btn-default" >Regresar</button>
              <button id="test-save-button" type="button" class="btn btn-primary">Guardar</button>
              <button type="button" id="test-enviar-button" class="btn btn-primary">Enviar</button>
          </div>

        </div>
      </div>
</div>
