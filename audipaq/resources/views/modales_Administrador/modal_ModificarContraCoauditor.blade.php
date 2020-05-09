{{-----------------------Modal Modificar Coauditor---------------------------}}
<div id="modificarContraCoauditor{{$coauditor->id_persona}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#546E7A;">
                <h4 class="modal-title" style="color: white" >Modificar Coauditor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form action="btnModificarContra_Coauditor" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="modal-body mx-auto" style="width: auto; background-color: #ECEFF1">
                    <div class="row">
                             <div class="col-3">
                                <b><label>Contrase&ntilde;a nueva </label></b>
                             </div>
                             <div class="col-5">
                                <input type="hidden" readonly="true" class="form-control" name="txtidpersona"  style="width: auto;" value={{$coauditor->id_persona}}>
                                <input type="password" class="form-control"  name="contraCoauditor1" style="width: auto;" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La contraseña debe contener al menos 8 caracteres invluyendo como mínimo un número, una minúscula y una mayúscula">
                             </div>
                    </div>
                    <div class="row">
                             <div class="col-3">
                                <b><label>Confirmar Contrase&ntilde;a</label></b>
                             </div>
                             <div class="col-5">
                                <input type="password" class="form-control"  name="contraCoauditor2" style="width: auto;" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La contraseña debe contener al menos 8 caracteres invluyendo como mínimo un número, una minúscula y una mayúscula">
                             </div>
                    </div>       
                </div>
                <div class="modal-footer" style="background:#546E7A; margin: auto;">
                    <button id="button" class="btn btn-primary" style="background: #00ACC1; border: none; align-items: center;">Guardar</button> 
                </div>
            </form>
            <form action="ver_Coauditor" method="get" enctype="multipart/form-data">
            {{ csrf_field() }}
                 <button id="button" class="btn btn-primary" class="btn btn-sm btn-default" data-dismiss="modal" style="background: #00ACC1; border: none; align-items: center; color: white;">Cancelar</button>
            </form>
        </div>
    </div>
</div>