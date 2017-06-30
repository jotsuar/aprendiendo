<div class="row">
    <section class="content-header">
      <h1><?php echo __('Adicionar').' '.__('User'); ?></h1>
    </section>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-sm btn-default shiny green"  href="<?php echo $this->Html->url(array('action'=>'index'));?>">
            <i class="glyphicon glyphicon-th-list"></i>
            <?php echo __('Listar'); ?>        </a>
    </div>
</div>
<hr/>
<div class="row">
	<div class="col-md-12">
		<div class="box box-default">
		    <div class="box-header with-border"></div>
			<?php echo $this->Form->create('User', array('role' => 'form','data-parsley-validate=""')); ?>
			<div class="box-body">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="row">
												<div class='col-md-6'>
							<div class='form-group'>
								<?php echo $this->Form->label('User.name',__('Name'), array('class'=>'control-label'));?>
								<?php echo $this->Form->input('name', array('class' => 'form-control border-input','label'=>false,'div'=>false)); ?>
							</div>
						</div>
						<div class='col-md-6'>
							<div class='form-group'>
								<?php echo $this->Form->label('User.email',__('Email'), array('class'=>'control-label'));?>
								<?php echo $this->Form->input('email', array('class' => 'form-control border-input','label'=>false,'div'=>false)); ?>
							</div>
						</div>
						<div class='col-md-6'>
							<div class='form-group'>
								<?php echo $this->Form->label('User.password',__('Password'), array('class'=>'control-label'));?>
								<?php echo $this->Form->input('password', array('class' => 'form-control border-input','label'=>false,'div'=>false)); ?>
							</div>
						</div>
						<div class='col-md-6'>
							<div class='form-group'>
								<?php echo $this->Form->label('User.document',__('Document'), array('class'=>'control-label'));?>
								<?php echo $this->Form->input('document', array('class' => 'form-control border-input','label'=>false,'div'=>false)); ?>
							</div>
						</div>
						<div class='col-md-6'>
							<div class='form-group'>
								<?php echo $this->Form->label('User.role',__('Role'), array('class'=>'control-label'));?>
								<?php echo $this->Form->input('role', array('class' => 'form-control border-input','label'=>false,'div'=>false,"options"=>array("admin"=>"Administrador","user_default" => "Solo ventas"))); ?>
							</div>
						</div>
						<div class='col-md-6'>
							<div class='form-group'>
								<?php echo $this->Form->label('User.phone',__('Phone'), array('class'=>'control-label'));?>
								<?php echo $this->Form->input('phone', array('class' => 'form-control border-input','label'=>false,'div'=>false)); ?>
							</div>
						</div>
						<div class='col-md-6'>
							<div class='form-group'>
								<?php echo $this->Form->label('User.address',__('Address'), array('class'=>'control-label'));?>
								<?php echo $this->Form->input('address', array('class' => 'form-control border-input','label'=>false,'div'=>false)); ?>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
            <div class="box-footer">
                <div class="col-md-6 col-md-offset-3">
                    <button type='submit' class='btn btn-primary btn-fill pull-right'>Guardar</button>
                </div>
            </div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>



