  <div class="col-md-12">
      <h2 class="titleview2"><?php echo __('Ingresa una nueva contraseña'); ?></h2>
      <h2 class="titleview"><?php echo __('Ingresa una nueva contraseña'); ?></h2>    
    <?php echo $this->Form->create('User',array('url' => array(
          'controller' => 'users',
          'action'   => 'change_password'),'data-parsley-validate=""'));?>
      <?php if (!empty($hash)) : ?>
        <?php echo $this->Form->input('hash',array('value' => $hash,'type' => 'hidden')); ?>
      <?php endif;?>
      <?php echo $this->Form->input('password',array('label' => __('Nueva contraseña')));?>
      <?php echo $this->Form->input('re_password',array('label' => __('Confirmar la nueva contraseña')));?>
    <div class="text-right"><?php echo $this->Form->end(__('Confirmar'),array('class' => 'btn-lg'));?></div>
  </div>

