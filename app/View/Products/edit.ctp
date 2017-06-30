


<div class="row">
    <section class="content-header">
      <h1><?php echo __('Editar').' '.__('Product'); ?></h1>
    </section>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
	    <a class="btn btn-sm btn-fill btn-success"  href="<?php echo $this->Html->url(array('action'=>'index'));?>">
	        <i class="fa fa-list-alt"></i>
	        <?php echo __('Listar'); ?>
	    </a>

	    <a class="btn btn-sm btn-fill btn-info" href="<?php echo $this->Html->url(array('action'=>'view',$this->request->data['Product']['id']));?>">
	        <i class="fa fa-eye"></i>
	        <?php echo __('Ver'); ?>
	    </a>

	    <a class="btn btn-sm btn-fill btn-warning"  href="<?php echo $this->Html->url(array('action'=>'add'));?>">
	        <i class="fa fa-plus-circle"></i>
	        <?php echo __('Adicionar'); ?>
	    </a>

	    <a class="deleteModal btn btn-sm btn-fill btn-danger" href="<?php echo $this->Html->url(array('action'=>'delete',$this->request->data['Product']['id']));?>" confirm-message="<?php echo __('¿Realmente deseas eliminar este ítem?'); ?>">
	        <i class="fa fa-trash"></i>
	        <?php echo __('Eliminar'); ?>
	    </a>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<div class="box box-default">
		    <div class="box-header with-border"></div>
			<?php echo $this->Form->create('Product', array('role' => 'form','data-parsley-validate=""')); ?>
			<div class="box-body">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="row">
												<div class='col-md-6' style="display:none;">
							<div class='form-group'>
							<?php echo $this->Form->input('id', array('class' => 'form-control border-input', 'label'=>false,'div'=>false)); ?>
							</div>
						</div>
						<div class='col-md-6' >
							<div class='form-group'>
							<?php echo $this->Form->label('Product.name',__('Name'), array('class'=>'control-label'));?>
							<?php echo $this->Form->input('name', array('class' => 'form-control border-input', 'label'=>false,'div'=>false)); ?>
							</div>
						</div>
						<div class='col-md-6' >
							<div class='form-group'>
							<?php echo $this->Form->label('Product.description',__('Description'), array('class'=>'control-label'));?>
							<?php echo $this->Form->input('description', array('class' => 'form-control border-input', 'label'=>false,'div'=>false)); ?>
							</div>
						</div>
						<div class='col-md-6' >
							<div class='form-group'>
							<?php echo $this->Form->label('Product.category_id',__('Category'), array('class'=>'control-label'));?>
							<?php echo $this->Form->input('category_id', array('class' => 'form-control border-input', 'label'=>false,'div'=>false)); ?>
							</div>
						</div>
						<div class='col-md-6' >
							<div class='form-group'>
							<?php echo $this->Form->label('Product.price',__('Price'), array('class'=>'control-label'));?>
							<?php echo $this->Form->input('price', array('class' => 'form-control border-input', 'label'=>false,'div'=>false)); ?>
							</div>
						</div>
						<div class='col-md-6' >
							<div class='form-group'>
							<?php echo $this->Form->label('Product.stock',__('Stock'), array('class'=>'control-label'));?>
							<?php echo $this->Form->input('stock', array('class' => 'form-control border-input', 'label'=>false,'div'=>false)); ?>
							</div>
						</div>
						<div class='col-md-6' >
							<div class='form-group'>
							<?php echo $this->Form->label('Product.quantity',__('Quantity'), array('class'=>'control-label'));?>
							<?php echo $this->Form->input('quantity', array('class' => 'form-control border-input', 'label'=>false,'div'=>false)); ?>
							</div>
						</div>
						<div class='col-md-6' >
							<div class='form-group'>
							<?php echo $this->Form->label('Product.sku',__('Sku'), array('class'=>'control-label'));?>
							<?php echo $this->Form->input('sku', array('class' => 'form-control border-input', 'label'=>false,'div'=>false)); ?>
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
