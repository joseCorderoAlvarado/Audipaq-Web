{{-----------------------Modal Recuperar Contraseña---------------------------}}
<div id="recuperarContrasena" class="modal fade recuperarContrasena">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#546E7A;">
                <h4 class="modal-title" style="color: white" >Recuperar contraseña</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form action="btnModificarContra_Auditor" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="modal-body mx-auto" style="width: auto; background-color: #ECEFF1">
                    <div class="row">
                             <div class="col-12">
                               <label>Indica el correo al que quieras que se envíe la nueva contraseña</label>
                               <center>
                               		<input id="idcorreoRecuperarContrasena" class="from-control" type="text" name="correoRecuperarContrasena" style="width: 90%; border-radius: 3px;" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="El correo debe contener entre caracteres el símbolo de '@' en seguida el símbolo de '.' y finalmente el dominio">
                               </center>
                             </div>
                    </div>       
                </div>
                <div class="modal-footer" style="background:#546E7A; margin: auto;">
                    <button id="button" class="btn btn-primary" style="background: #00ACC1; border: none; align-items: center;">Guardar</button> 
                </div>
            </form>
        </div>
    </div>
</div>