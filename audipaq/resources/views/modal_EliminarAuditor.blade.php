{{-----------------------Modal de confirmación de Eliminar Auditor---------------------------}}
<div id="eliminarAuditor{{$auditor->id_persona}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#546E7A;">
                <h4 class="modal-title" style="color: white" >Eliminar Auditor/Coauditor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body mx-auto" style="width: auto; background-color: #ECEFF1">
                <b><label id="form_nombre">¿Estás seguro que deseas eliminar al auditor {{$auditor->nombre_persona}} ?</label></b>
            </div>
            <div class="modal-footer">
                    <input type="hidden" name="txtIdPersona" value="{{$auditor->id_persona}}">
                    <button type="button" class="btn btn-default" id="modal-btn-si" style="background: #00ACC1; border: none; align-items: center; color: white;">Si</button>
                    <button type="button" class="btn btn-primary" id="modal-btn-no" style="background: #00ACC1; border: none; align-items: center;">No</button>
            </div>
        </div>
    </div>
</div>

<div class="alert" role="alert" id="result"></div>