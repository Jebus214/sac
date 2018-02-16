

<div id="form-modal-interno" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <!-- <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button> -->
            <h4 class="modal-title" id="myModalLabel">SAC</h4>
          </div>
          <div class="modal-body">


            <div class="enviar-modal">
              <form id="form-edit-interno" role="form" class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-sm-offset-2 col-sm-2">Area</label>
                <div class="col-sm-6">
                  <input class="form-control" id="test-area" placeholder="Area" type="text">
                </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-offset-2 col-sm-2">Oficio</label>
                  <div class="col-sm-6">
                    <input class="form-control" id="test-no_oficio" placeholder="Oficio" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-offset-2 col-sm-2">Asunto</label>
                  <div class="col-sm-6">
                    <input class="form-control" id="test-asunto" placeholder="Asunto" type="text">
                  </div>
                </div>
                
                  <div class="form-group">
                    <label class="control-label col-sm-offset-2 col-sm-2">C.C.P.</label>
                    <div class="col-sm-6">
                      <select class="form-control" id="test-copia_id" placeholder="C.C.P.">
                        
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-offset-2 col-sm-2"></label>
                    <div class="col-sm-6">
                      <input class="form-control" id="test-oficio_id" placeholder="" type="hidden">
                    </div>
                  </div>
                  <div class="col-sm-3 col-sm-offset-9">
                    
                  </div>
                </form>

            </div>



            <div   class="alert alert-success alert-dismissible fade in" role="alert">
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
