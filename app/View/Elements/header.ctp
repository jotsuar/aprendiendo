  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Tienda</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Tienda</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $this->Html->url("/dist/img/user2-160x160.jpg") ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo AuthComponent::user("name") ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $this->Html->url("/dist/img/user2-160x160.jpg") ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo AuthComponent::user("name") ?> - <?php echo ucfirst( AuthComponent::user("role")) ?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo $this->Html->url("/users/edit")  ?>" class="btn btn-default btn-flat">Editar perfil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo $this->Html->url("/users/logout")  ?>" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>