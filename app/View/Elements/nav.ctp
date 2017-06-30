<?php if(!Configure::read('Application.maintenance')){?>
<nav class="navbar navbar-inverse navbar-fixed-top backimg" role="navigation">
	<div class="overlaymini"></div>
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>

		<h1 class="navbar-brand nameapp">Las Bahamas</h1>
	</div>


<div class="collapse navbar-collapse navbar-ex1-collapse borderb1">
		<ul class="nav navbar-nav navbar-right navbar-user">
			<?php if(AuthComponent::user("role") != "admin"): ?>
			<li>
				<a href="#" class="viewCart">
					<img class="iconbarmanu" src="<?php echo $this->webroot; ?>img/layout/shopping-cart2.png">
				    <span><strong>$</strong>
				    <b class="valueCart">0</b></span>

				</a>
			</li>
			<?php endif; ?>
			<li class="dropdown user-dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><b> <?php echo AuthComponent::user('name')?></b> <img class="iconbarmanu" src="<?php echo $this->webroot; ?>img/layout/user.png">
				<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo $this->params->webroot?>me/edit"><i class="fa fa-gear"></i> Editar perfil</a>
					<div class="ti"></div><div class="td"></div>
					</li>
				</ul>
				<li><a href="<?php echo $this->params->webroot?>logout">					
				<img class="iconbarmanu" src="<?php echo $this->webroot; ?>img/layout/off.png">			
				</a></li>
			</li>
		</ul>

</div>




	<div class="collapse navbar-collapse navbar-ex1-collapse text-center">
		<?php if(AuthComponent::user('id')){?>
			<ul class="nav navbar-nav navbar-user ulmenu">

				<?php if(AuthComponent::user("role") == "admin"): ?>
				<li class="dropdown <?php echo $this->params->params['controller'] == 'users' ? 'active' : ''?>">
					<a class="hvr-underline-from-center" href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img class="imgopt" src="<?php echo $this->webroot; ?>img/layout/usuarios.png">			
					Usuarios <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $this->params->webroot?>users"> Ver usuarios</a></li>
						<li><a href="<?php echo $this->params->webroot?>users/add">Registrar usuario</a></li>
						<div class="ti"></div><div class="td"></div>
					</ul>
				</li>
				<li class="dropdown <?php echo $this->params->params['controller'] == 'products' ? 'active' : ''?>">
					<a class="hvr-underline-from-center" href="#" class="dropdown-toggle" data-toggle="dropdown"> <img class="imgopt" src="<?php echo $this->webroot; ?>img/layout/pedido.png"> Productos <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $this->params->webroot?>products">Ver productos</a></li>
						<li><a href="<?php echo $this->params->webroot?>products/add"> Registrar productos</a></li>
						<li><a href="<?php echo $this->params->webroot?>publisheds">Historial de productos</a></li>
						<div class="ti"></div><div class="td"></div>
					</ul>
				</li>
				<li class=" <?php echo $this->params->params['controller'] == 'orders' && $this->params->params['action'] == "day" ? 'active' : ''?>">
						<a class="hvr-underline-from-center" href="<?php echo $this->webroot ?>orders/day"><img class="imgopt" src="<?php echo $this->webroot; ?>img/layout/hoy.png"> Pedidos del día</a>
				</li>
				<?php else: ?>
					<li class=" <?php echo $this->params->params['controller'] == 'orders' && $this->params->params['action'] == "create" ? 'active' : ''?>">
						<a class="hvr-underline-from-center" href="<?php echo $this->webroot ?>orders/create"><img class="imgopt" src="<?php echo $this->webroot; ?>img/layout/pedido.png"> Productos disponibles </a>
					</li>
				<?php endif;?>
					<li class=" <?php echo $this->params->params['controller'] == 'orders' && $this->params->params['action'] == "totalorders" ? 'active' : ''?>">
						<a class="hvr-underline-from-center" href="<?php echo $this->webroot ?>orders/totalorders"><img class="imgopt" src="<?php echo $this->webroot; ?>img/layout/informes.png"> REPORTES </a>
					</li>
			</ul>

		<?php }?>

	</div>
	<!-- /.navbar-collapse -->
</nav>
<?php } ?>