{{-----------------------Modal Crear Acta---------------------------}}
<div id="agregarActa" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#546E7A;">
                <h4 class="modal-title" style="color: white" >Agregar Acta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
		
            <form action="btnCrear_Acta_Coa" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="modal-body mx-auto" style="width: auto; background-color: #ECEFF1">
                    <div class="row">
                        <div class="col-1">
                            <b><label>Acta</label></b>
                        </div>
                        <div class="col-5">
                           <select name="txtIdActa" class="form-control" style="width: auto;"  >
                                <option selected >Selecciona el acta que quieras agregar
                                </option>
                                @foreach ($listaTodasActas as $acta2)
                                <option  value={{$acta2->id_acta }}>
                                Acta no. {{$acta2->id_acta}} de {{$acta2->nombre_persona}} {{$acta2->apellido_paterno}} {{$acta2->apellido_materno}} 
                                </option>
                                @endforeach     
                            </select> 
                        </div>
                    </div>
                    <br>
                       
                </div>
                <div class="modal-footer" style="background:#546E7A; margin: auto;">
                    <button id="button" class="btn btn-primary" style="background: #00ACC1; border: none; align-items: center;">Agregar</button> 
                </div>
            </form>
        </div>
    </div>
</div>