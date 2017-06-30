<?php if($action == 'add') { ?>
<div class="row">
    <section class="content-header">
      <h1><?php printf("<?php echo __('%s').' '.__('%s'); ?>", 'Adicionar', $singularHumanName); ?></h1>
    </section>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-sm btn-default shiny green"  href="<?php echo "<?php echo \$this->Html->url(array('action'=>'index'));?>"?>">
            <i class="glyphicon glyphicon-th-list"></i>
            <?php echo "<?php echo __('Listar'); ?>" ?>
        </a>
    </div>
</div>
<hr/>
<div class="row">
	<div class="col-md-12">
		<div class="box box-default">
		    <div class="box-header with-border"></div>
			<?php  echo "<?php echo \$this->Form->create('{$modelClass}', array('role' => 'form','data-parsley-validate=\"\"')); ?>\n"; ?>
			<div class="box-body">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="row">
						<?php		
							foreach ($fields as $field) {
								if(in_array($field , array('state'))) continue;
								if (strpos($action, 'add') !== false && $field == $primaryKey) {
									continue;
								} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
									$label = ucfirst(Inflector::humanize(strtolower($field)));
									$rest = substr($label, -2);
									if($rest == 'Id') {
										$label = substr($label, 0, -3);
									}
									echo "\t\t\t\t\t\t<div class='col-md-6'>\n";
									echo "\t\t\t\t\t\t\t<div class='form-group'>\n";
									if($field != $primaryKey) echo "\t\t\t\t\t\t\t\t<?php echo \$this->Form->label('{$modelClass}.{$field}',__('$label'), array('class'=>'control-label'));?>\n";
									echo "\t\t\t\t\t\t\t\t<?php echo \$this->Form->input('{$field}', array('class' => 'form-control border-input','label'=>false,'div'=>false)); ?>\n";
									echo "\t\t\t\t\t\t\t</div>\n";
									echo "\t\t\t\t\t\t</div>\n";
								}
							}
							if (!empty($associations['hasAndBelongsToMany'])) {
								foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
									$label = ucfirst(Inflector::humanize(strtolower($assocName)));
									echo "\t\t\t\t\t\t<div class='col-md-6'>\n";
									echo "\t\t\t\t\t\t\t\t<div class='form-group'>\n";
									echo "\t\t\t\t\t\t\t\t<?php echo \$this->Form->label('',__('$label'), array('class'=>'control-label'));?>\n";
									echo "\t\t\t\t\t\t\t\t<?php echo \$this->Form->input('{$assocName}',array('class' => 'form-control border-input','label'=>false,'div'=>false));?>\n";
									echo "\t\t\t\t\t\t\t\t</div>\n";
									echo "\t\t\t\t\t\t</div>\n";
								}
							}
						?>
						</div>
					</div>
				</div>
			</div>
            <div class="box-footer">
                <div class="col-md-6 col-md-offset-3">
                    <button type='submit' class='btn btn-primary btn-fill pull-right'><?php echo __('Guardar'); ?></button>
                </div>
            </div>
			<?php echo "<?php echo \$this->Form->end(); ?>\n";?>
		</div>
	</div>
</div>
<?php } ?>



<?php if($action == 'edit') { ?>
<div class="row">
    <section class="content-header">
      <h1><?php printf("<?php echo __('%s').' '.__('%s'); ?>", 'Editar', $singularHumanName); ?></h1>
    </section>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
	    <a class="btn btn-sm btn-fill btn-success"  href="<?php echo "<?php echo \$this->Html->url(array('action'=>'index'));?>" ?>">
	        <i class="fa fa-list-alt"></i>
	        <?php echo "<?php echo __('Listar'); ?>\n"; ?>
	    </a>

	    <a class="btn btn-sm btn-fill btn-info" href="<?php echo "<?php echo \$this->Html->url(array('action'=>'view',\$this->request->data['{$modelClass}']['id']));?>" ?>">
	        <i class="fa fa-eye"></i>
	        <?php echo "<?php echo __('Ver'); ?>\n"; ?>
	    </a>

	    <a class="btn btn-sm btn-fill btn-warning"  href="<?php echo "<?php echo \$this->Html->url(array('action'=>'add'));?>" ?>">
	        <i class="fa fa-plus-circle"></i>
	        <?php echo "<?php echo __('Adicionar'); ?>\n"; ?>
	    </a>

	    <a class="deleteModal btn btn-sm btn-fill btn-danger" href="<?php echo "<?php echo \$this->Html->url(array('action'=>'delete',\$this->request->data['{$modelClass}']['id']));?>" ?>" confirm-message="<?php echo "<?php echo __('¿Realmente deseas eliminar este ítem?'); ?>" ?>">
	        <i class="fa fa-trash"></i>
	        <?php echo "<?php echo __('Eliminar'); ?>\n"; ?>
	    </a>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<div class="box box-default">
		    <div class="box-header with-border"></div>
			<?php  echo "<?php echo \$this->Form->create('{$modelClass}', array('role' => 'form','data-parsley-validate=\"\"')); ?>\n"; ?>
			<div class="box-body">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="row">
						<?php
							foreach ($fields as $field) {
									if(in_array($field , array('state'))) continue;
									$label = ucfirst(Inflector::humanize(strtolower($field)));
									$rest = substr($label, -2);
									if($rest == 'Id') {
										$label = substr($label, 0, -3);
									}
									$divHide = '';
									if($field == 'id') {
										$divHide = 'style="display:none;"';
									}
									if (strpos($action, 'add') !== false && $field == $primaryKey) {
										continue;
									} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
	echo "\t\t\t\t\t\t<div class='col-md-6' $divHide>\n";
	echo "\t\t\t\t\t\t\t<div class='form-group'>\n";
										if($field != $primaryKey) echo "\t\t\t\t\t\t\t<?php echo \$this->Form->label('{$modelClass}.{$field}',__('$label'), array('class'=>'control-label'));?>\n";
										echo "\t\t\t\t\t\t\t<?php echo \$this->Form->input('{$field}', array('class' => 'form-control border-input', 'label'=>false,'div'=>false)); ?>\n";
										echo "\t\t\t\t\t\t\t</div>\n";
										echo "\t\t\t\t\t\t</div>\n";
									}
								}
								if (!empty($associations['hasAndBelongsToMany'])) {
									foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
										$label = ucfirst(Inflector::humanize(strtolower($assocName)));
	echo "\t\t\t\t\t\t<div class='col-md-6'>\n";
	echo "\t\t\t\t\t\t\t<div class='form-group'>\n";
										echo "\t\t\t\t\t\t\t<?php echo \$this->Form->label('',__('$label'), array('class'=>'control-label'));?>\n";
										echo "\t\t\t\t\t\t\t<?php echo \$this->Form->input('{$assocName}',array('class' => 'form-control border-input', 'label'=>false,'div'=>false));?>\n";
										echo "\t\t\t\t\t\t\t</div>\n";
										echo "\t\t\t\t\t\t</div>\n";
									}
								}
							?>
							</div>
					</div>
				</div>
			</div>
            <div class="box-footer">
                <div class="col-md-6 col-md-offset-3">
                    <button type='submit' class='btn btn-primary btn-fill pull-right'><?php echo __('Guardar'); ?></button>
                </div>
            </div>
			<?php echo "<?php echo \$this->Form->end(); ?>\n";?>
		</div>
	</div>
</div>
<?php } ?>