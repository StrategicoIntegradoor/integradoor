<aside class="main-sidebar">



	 <section class="sidebar">



		<ul class="sidebar-menu">



		<?php



		if($_SESSION["rol"] == 1 || $_SESSION["rol"] == 2){



			echo '<li class="active">



				<a href="inicio">



					<i class="fa fa-home"></i>

					<span>Inicio</span>



				</a>



			</li>
			
			<li>



				<a href="autogestion">



					<i class="fa fa-user"></i>

					<span>Autogestión</span>



				</a>



			</li>

	

			<li>



				<a href="clientes">



					<i class="fa fa-user-circle-o"></i>

					<span>Clientes</span>



				</a>



			</li>

			

			<li>



				<a href="cotizar">



					<i class="fa fa-car"></i>

					<span>Cotizar Liviano</span>



				</a>



			</li>

			<li>



				<a href="pesados">



					<i class="fa fa-truck"></i>

					<span>Cotizar Pesados</span>



				</a>



			</li>

			<li>



			<a href="motos">



				<i class="fa fa-motorcycle"></i>

				<span>Cotizar Motos</span>



			</a>



		</li>

			<li>



				<a href="inicio">



					<i class="fa fa-list-ul"></i>

					<span>Admin Cotizaciones</span>



				</a>



 			</li>';



		}



		if($_SESSION["rol"] == 1){



			echo '<li>



				<a href="usuarios">



					<i class="fa fa-user-plus"></i>

					<span>Usuarios</span>



				</a>



			</li>



			<li>



				<a href="motos">



					<i class="fa fa-bar-chart"></i>

					<span>Estadisticas</span>



				</a>



			</li>
			
			<li>



				<a href="ayuda-ventas">



					<i class="fa fa-credit-card"></i>

					<span>Ayuda Ventas</span>



				</a>



			</li>';



		}



		?>



		</ul>



	 </section>



</aside>