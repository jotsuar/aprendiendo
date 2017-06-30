  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $this->Html->url("/dist/img/user2-160x160.jpg") ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo AuthComponent::user("name") ?></p>
        </div>
      </div>
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Categorías</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->Html->url("/categories/index") ?>"><i class="fa fa-circle-o"></i> Listar</a></li>
            <li><a href="<?php echo $this->Html->url("/categories/add") ?>"><i class="fa fa-circle-o"></i> Crear</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Productos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->Html->url("/products/index") ?>"><i class="fa fa-circle-o"></i> Listar</a></li>
            <li><a href="<?php echo $this->Html->url("/products/add") ?>"><i class="fa fa-circle-o"></i> Crear</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Clientes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->Html->url("/customers/index") ?>"><i class="fa fa-circle-o"></i> Listar</a></li>
            <li><a href="<?php echo $this->Html->url("/customers/add") ?>"><i class="fa fa-circle-o"></i> Crear</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Ordenes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->Html->url("/orders/index") ?>"><i class="fa fa-circle-o"></i> Listar</a></li>
            <li><a href="<?php echo $this->Html->url("/orders/add") ?>"><i class="fa fa-circle-o"></i> Crear</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->Html->url("/users/index") ?>"><i class="fa fa-circle-o"></i> Listar</a></li>
            <li><a href="<?php echo $this->Html->url("/users/add") ?>"><i class="fa fa-circle-o"></i> Crear</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>