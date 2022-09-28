 <header class="main-header">
 	
	<!--=====================================
	LOGOTIPO
	======================================-->
	<a href="inicio" class="logo">
		
		<!-- logo mini -->
		<span class="logo-mini">
			
		<img src="vistas/img/plantilla/icon_Integradoor_Cotizador.png" class="img-responsive" style="padding:10px">

		</span>

		<!-- logo normal -->

		<span class="logo-lg">
			
		<img src="vistas/img/plantilla/Logo_Integradoor_Cotizador_2.png" class="img-responsive" style="padding: 0px 5px">

		</span>

	</a>

	<!--=====================================
	BARRA DE NAVEGACIÓN
	======================================-->
	<nav class="navbar navbar-static-top" role="navigation">
		
		<!-- Botón de navegación -->

	 	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        	
        	<span class="sr-only">Toggle navigation</span>
      	
      	</a>

		<!-- perfil de usuario -->

		<div class="navbar-custom-menu">
				
			<ul class="nav navbar-nav">
				
				<li class="dropdown user user-menu">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">

					<?php

					if($_SESSION["foto"] != ""){

						echo '<img src="'.$_SESSION["foto"].'" class="user-image">';

					}else{


						echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

					}


					?>
						
						<span class="hidden-xs"><?php  echo $_SESSION["nombre"] . ' '. $_SESSION["apellido"]; ?></span>

					</a>

					<!-- Dropdown-toggle -->

					<ul class="dropdown-menu">

						<?php

							if ($_SESSION["rol"] == 1) {
						?>
						
							<li class="user-body">
									
								<a href="intermediario" class="btn btn-default btn-flat">Ver mi perfil</a>
							</li>

						<?php
								}
						?>
						
						<li class="user-body">
								
							<a href="salir" class="btn btn-default btn-flat">Cerrar Sesión</a>

						</li>
						

					</ul>

				</li>

			</ul>

		</div>

	</nav>

 </header>