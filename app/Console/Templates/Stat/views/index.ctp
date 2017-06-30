<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="row">
    <section class="content-header">
      <h1><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h1>
    </section>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <?php echo "<?php echo \$this->Form->create('User', array('role' => 'form','type'=>'GET','class'=>'form-inline')); ?>"; ?>
            <div class="form-group">
                <label class="sr-only" for="q"><?php echo __('Buscar');?></label>
                <?php echo "<?php echo \$this->Form->input('q', array('placeholder'=>__('Buscar...'), 'class'=>'form-control','label'=>false,'div'=>false,'value'=>\$q)) ?>" ?>
            </div>
            <button type="submit" class="btn btn-default"><?php echo __('Buscar');?></button>
			<a class="btn btn-info pull-right" href="<?php echo "<?php echo \$this->Html->url(array('controller'=>\$this->request->controller,'action'=>'add')); ?>" ?>">
			    <?php echo "<?php echo __('Adicionar'); ?>"; ?>
			</a>
        <?php echo "<?php echo \$this->Form->end(); ?>"; ?>
    </div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-body table-responsive no-padding">
				<?php echo "<?php if(empty(\${$pluralVar}) && !empty(\$this->request->query['q'])) : ?>\n" ?>
				<?php echo "\t\t\t<script type='text/javascript'>$(function(){demo.showNotification('<?php echo __('No se encontraron datos');?>', 'top','center','info');})</script>\n"; ?>
				<?php echo "<?php endif; ?>\n" ?>
				<table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
					<thead class="text-primary">
						<tr>						<?php echo "\n" ?>
				<?php foreach ($fields as $field):
					$title = ucfirst(mb_strtolower($field));
					if(in_array($field , array('id','created','modified','sucursal_id'))) continue;
					$rest = substr($title, -3);
					if($rest == '_id') {
						$title = substr($title, 0, -3);
					}
					$title = Inflector::humanize($title);
				?>
				<th><?php echo "<?php echo \$this->Paginator->sort('{$field}', __('{$title}')); ?>"; ?></th>
				<?php endforeach; ?>
				<th><?php echo "<?php echo __('Acciones'); ?>"; ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
		echo "<?php \n\t\t\t\t if(!empty(\${$pluralVar})): ?>\n";
		echo "<?php \t\t\t\t\t foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
		echo "\t\t\t\t\t\t\t<tr>\n\t\t";
						foreach ($fields as $field) {
							if(in_array($field , array('id','created','modified'))) continue;
							$isKey = false;
							if (!empty($associations['belongsTo'])) {
								foreach ($associations['belongsTo'] as $alias => $details) {
									$clave = $details['displayField'];
									$name = array_search('name', $details['fields']);
									if(!empty($name)) $clave = 'name';
									if ($field === $details['foreignKey']) {
										$isKey = true;
										echo "\t\t\t\t\t\t\t\t<td>\n\t\t\t\t\t\t\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$clave}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t\t\t\t\t\t</td>\n";
										break;
									}
								}
							}
							if ($isKey !== true) {

								if($field == "state"){
									echo "\t\t\t\t\t\t\t\t<td> <?php echo \${$singularVar}['{$modelClass}']['{$field}'] == 1 ? __('Activo') : __('Inactivo') ;?> </td>";
								}else{
									echo "\t\t\t\t\t\t\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
								}

								
							}
						}
					?>
									<td class="td-actions">
									    <a rel="tooltip" href="<?php echo "<?php echo \$this->Html->url(array('action' => 'view',\${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>"  ?>" title="<?php echo "<?php echo __('Ver'); ?>"; ?>" class="btn btn-info  btn-xs">
									        <i class="fa fa-eye"></i>
									    </a>
									    <a rel="tooltip" href="<?php echo "<?php echo \$this->Html->url(array('action' => 'edit',\${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>"  ?>" title="<?php echo "<?php echo __('Editar'); ?>"; ?>" class="btn btn-success btn-xs">
									        <i class="fa fa-edit"></i>
									    </a>
									    <a rel="tooltip" href="<?php echo "<?php echo \$this->Html->url(array('action' => 'delete',\${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>"  ?>" title="<?php echo "<?php echo \${$singularVar}['{$modelClass}']['state'] == 1 ? __('Deshabilitar') : __('Habilitar'); ?>"; ?>" class="btn btn-danger btn-xs changeState">
									    	<?php echo "<?php if(\${$singularVar}['{$modelClass}']['state'] == 1): ?>"; ?>
									        <i class="fa fa-times-circle-o"></i>
									        <?php echo "<?php else:  ?>" ?>
									        <i class="fa fa-check-circle"></i>
									        <?php echo "<?php endif;  ?>" ?>
									    </a>
									</td>
					<?php 
							echo "\t\t</tr>\n";
							echo "\t\t\t\t\t<?php endforeach; ?>\n";
							echo "\t\t\t\t\t<?php else: ?>\n";
							echo "\t\t\t\t\t\t\t<tr><td class='text-center' colspan='<?php echo 1; ?>'>No existen resultados</td><tr>\n\t\t";
							echo "\t\t\t\t\t<?php endif; ?>\n";	
					 ?>
					</tbody>
				</table>
			</div>
		</div>
		<p>
			<small>
				<?php echo "<?php
					echo \$this->Paginator->counter(array(
					'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count} en total, comenzando en {:start}, terminando en {:end}')
					));
				?>\n"; ?>
			</small>
		</p>

		<ul class="pagination pagination-info">
			<?php
				echo "<?php\n";
				echo "\t\t\t\t\techo \$this->Paginator->prev('< ' . __('Ant'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));\n";
				echo "\t\t\t\t\techo \$this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));\n";
				echo "\t\t\t\t\techo \$this->Paginator->next(__('Sig') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));\n";
				echo "\t\t\t\t?>\n";
			?>
		</ul>
	</div>
</div>
