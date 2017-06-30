<div class="row">
	<div class="col-md-12">
	<?php echo $this->Form->create('User',array('url' => array(
				'controller' => 'users',
				'action'	 => 'remember_password'),'data-parsley-validate=""'));?>
				
        <h2 class="titleview"><?php echo __('¿Olvidaste tu contraseña?'); ?></h2>
		<?php echo $this->Html->tag('p',__('Para reestablecer tu contraseña debes ingresar tu dirección de correo electrónico y recibirás un mensaje de verificación de la cuenta.'));?>
	    <?php echo $this->Form->input('email',array(
										    		'placeholder' => __('Ingresa tu correo electrónico'),
										    		'label' => __('Correo electrónico'),
										    		'class' => 'email-field')); ?>

		<div class="text-right">
			<button type="submit" class="btn btn-primary btn-block btn-flat">
			<?php echo __('Recordar')?></button>
		</div>
		</form>
	</div>
</div>
