{{-------------------------Menú de navegación---------------------------}}
<div class="container-fluid" style="background-color: #546E7A">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-expand-lg	navbar-light bg-light" style="background-color: #546E7A !important">
    			<a	href="{{ url('homePage_Auditado')}}"><img src="images/audipaq.png" width="200" height="60"	class="d-inline-block align-top" alt=""></a>

				<button	class="navbar-toggler"	type="button"	data-toggle="collapse"data-target="#navbarSupportedContent"	aria-controls="navbarSupportedContent" aria-expanded="false"	aria-label="Toggle	navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<div	class="navbar-nav ml-auto">
						<a	class="navbar-brand" href="{{url('homePage_Auditado')}}" style="color: #fff"><b>Inicio</b></a>
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


