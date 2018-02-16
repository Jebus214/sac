<div>
                
                <div class="container" >
      <div class="row">
        <div class="col-md-12">
                    <input class=" col-sm-offset-2 col-sm-2" type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

          <form id="capturaForm" class="form-horizontal"  >
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

          
          

            <button id="guardar" class="btn btn-primary col-sm-offset-8 col-sm-2">Guardar Cambios</button>
          
          </form>

        </div>
      </div>
    </div>
            </div>