{{-----------------------Modal Crear Coauditor---------------------------}}
<div id="crearCoauditor" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#546E7A;">
                <meta charset="utf-8">
                <h4 class="modal-title" style="color: white" >Crear Coauditor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
		
             <form action="btnCrear_Coauditor" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="modal-body mx-auto" style="width: auto; background-color: #ECEFF1">
                    <div class="row">
                            <div class="col-3">
                                <b><label>Nombre</label></b>
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control" name="txtnombreCoauditor" title="El nombre debe llevar solo letras y espacios" pattern="[A-Za-záéíóúñü\s]+" required style="width: auto;">
                            </div>
                    </div>
                    <br>
                     <div class="row">
                            <div class="col-3">
                                <b><label>Apellido Paterno</label></b>
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control"  name="txtapellidoPatCoauditor" title="El apellido paterno debe llevar solo letras y espacios" pattern="[A-Za-záéíóúñü\s]+" required style="width: auto;">
                            </div>
                    </div>
                    <br>
                    <div class="row">
                            <div class="col-3">
                                <b><label>Apellido Materno</label></b>
                            </div>
                            <div class="col-5">    
                                <input type="text" class="form-control"  name="txtapellidoMatCoauditor" title="El apellido materno debe llevar solo letras y espacios" pattern="[A-Za-záéíóúñü\s]+" required style="width: auto;">
                            </div>
                    </div>
                    <br>
                    <div class="row">
                            <div class="col-3">
                                 <b><label>Correo</label></b>
                            </div>
                            <div class="col-5">
                                  <input type="email" class="form-control" name="correoCoauditor" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="El correo debe contener entre caracteres el símbolo de '@' en seguida el símbolo de '.' y finalmente el dominio" required style="width: auto;">
                            </div>
                    </div>
                    <br>
                    <div class="row">
                             <div class="col-3">
                                <b><label>Contrase&ntilde;a</label></b>
                             </div>
                             <div class="col-5">
                                <input type="password" class="form-control"  name="contraCoauditor" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La contraseña debe contener al menos 8 caracteres invluyendo como mínimo un número, una minúscula y una mayúscula" required style="width: auto;">
                             </div>
                    </div>
                    <br>
                   <div class="row">
                            <div class="col-3">
                                <b><label>Empresa</label></b>
                            </div>
                            <div class="col-5"> 
                                <select name="fkEmpresa" class="form-control" style="width: auto;">
                                    <option selected>Selecciona una empresa
                                    </option>
                                    @foreach ($listaEmpresas as $empresa)
                                    <option value={{$empresa->id_empresa }}>
                                        {{ $empresa->nombre_empresa}} 
                                    </option>
                                    @endforeach     
                                </select> 
                            </div>
                    </div> 
                    <br>     
                </div>
                <div class="modal-footer" style="background:#546E7A; margin: auto;">
                    <button id="button" class="btn btn-primary" style="background: #00ACC1; border: none; align-items: center;">Guardar</button> 

                </div>
            </form>
        </div>
    </div>
</div>