<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo $this->webroot; ?>"><b>Tienda</b></a>
  </div>
  <div class="login-box-body">
    <h2 class="login-box-msg">Iniciar sesión</h2>
    <?php echo $this->Form->create('User',array('url' => array('controller' => 'users','action' => 'login'),'data-parsley-validate=""'));?>
      <div class="form-group has-feedback">
        <?php echo $this->Form->input('email', array('label' => false,'placeholder' => __('Correo electrónico')));?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <?php echo $this->Form->input('password', array('label' => false,'placeholder' => __('Contraseña')));?>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <div class="form-group">
            <?php echo $this->Html->link(__('¿Olvidaste tu contraseña?'),array('controller' => 'users','action' => 'remember_password')) ?>
          </div>
        </div>
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary btn-block btn-flat">
            <?php echo __('Iniciar sesión')?>            
          </button>         
        </div>
      </div>
    </form>    
  </div>
</div>


