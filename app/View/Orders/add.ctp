<div class="row">
    <section class="content-header">
      <h1><?php echo __('Adicionar').' '.__('Order'); ?></h1>
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
			<?php echo $this->Form->create('Order', array('role' => 'form','data-parsley-validate=""')); ?>
			<div class="box-body">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="row">
												<div class='col-md-6'>
							<div class='form-group'>
								<?php echo $this->Form->label('Order.date',__('Date'), array('class'=>'control-label'));?>
								<?php echo $this->Form->input('date', array('class' => 'form-control border-input','label'=>false,'div'=>false)); ?>
							</div>
						</div>
						<div class='col-md-6'>
							<div class='form-group'>
								<?php echo $this->Form->label('Order.total',__('Total'), array('class'=>'control-label'));?>
								<?php echo $this->Form->input('total', array('class' => 'form-control border-input','label'=>false,'div'=>false)); ?>
							</div>
						</div>
						<div class='col-md-6'>
							<div class='form-group'>
								<?php echo $this->Form->label('Order.user_id',__('User'), array('class'=>'control-label'));?>
								<?php echo $this->Form->input('user_id', array('class' => 'form-control border-input','label'=>false,'div'=>false)); ?>
							</div>
						</div>
						<div class='col-md-6'>
							<div class='form-group'>
								<?php echo $this->Form->label('Order.customer_id',__('Customer'), array('class'=>'control-label'));?>
								<?php echo $this->Form->input('customer_id', array('class' => 'form-control border-input','label'=>false,'div'=>false)); ?>
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



