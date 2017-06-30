  <div class="col-md-12">
    <?php echo $this->Form->create('User',array('data-parsley-validate=""'));?>
        <h2 class="titleview2"><?php echo __($label); ?></h2>
        <h2 class="titleview"><?php echo __($label); ?></h2>

        <?php echo $this->Form->input('name',array(
            'label' => __('Nombre'),
            'value' => !empty( $user['name'] ) ? $user['name'] : ''));?>
      
        <?php echo $this->Form->input('email', array(
            'label' => __('Correo electrónico'),
            'value' => !empty( $user['email'] ) ? $user['email'] : ''));?>
     
        <?php echo $this->Form->input('password',array(
            'label' => __('Contraseña'),
            'value' => false));?>


	      <?php if(AuthComponent::user('role') == 'admin'){?>
        <?php echo $this->Form->input('role', array(
            'label' => __('Rol'),
            'options' => array('admin' => __('Admin'), 'functionary' => __('Functionario')),
            'selected' => !empty( $user['role'] ) ? $user['role'] : ''));?>
	      <?php }?>
      
        <div class="text-right "><?php echo $this->Form->end(__("Guardar"));?> </div>
  </div>
