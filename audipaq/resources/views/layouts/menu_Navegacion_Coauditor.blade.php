{{-------------------------Menú de navegación---------------------------}}
<div class="container-fluid" style="background-color: #546E7A">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-expand-lg	navbar-light bg-light" style="background-color: #546E7A !important">
    			<a	href="{{ url('homePage_Administrador')}}"><img src="images/audipaq.png" width="200" height="60"	class="d-inline-block align-top" alt=""></a>

				<button	class="navbar-toggler"	type="button"	data-toggle="collapse"data-target="#navbarSupportedContent"	aria-controls="navbarSupportedContent" aria-expanded="false"	aria-label="Toggle	navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<div	class="navbar-nav ml-auto">
						<a	class="navbar-brand" href="{{url('homePage_Coauditor')}}" style="color: #fff"><b>Inicio</b></a>

                     		<div class="dropdown">
					            <div class="nav-item dropdown" >
									<a  class="navbar-brand" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown" href="{{ url('')}}" style="color: #fff"> <span class="caret"></span><b>Mi empresa</b>
										<div class="dropdown-menu" aria-labelledby="dropdownmenu" style="background-color: #546E7A!important">
		    							<a class="dropdown-item"  href="{{url('ver_Auditorias')}}" style="color: #fff">Ver Auditorias</a>
		    							<a class="dropdown-item" href="{{url('ver_Coauditorias')}}" style="color: #fff">Ver Coauditores</a>
		  								</div>
									</a>
					            </div>
			          		</div>
						<div class="nav-item dropdown">
							<a	type="button" class="btn btn-primary" style="background: #00ACC1; border: none;" href="{{ url('btnLogout')}}" style="color: #fff"><b>Cerrar sesión</b></a>
			            </div>
					</div>
				</div>
			</nav>
		</div>
	</div>
</div>
{{-----------------------FinMenú de navegación---------------------------}}


