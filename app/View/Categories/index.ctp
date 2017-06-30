<div class="row">
    <section class="content-header">
      <h1><?php echo __('Categories'); ?></h1>
    </section>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->create('User', array('role' => 'form','type'=>'GET','class'=>'form-inline')); ?>            <div class="form-group">
                <label class="sr-only" for="q">Buscar</label>
                <?php echo $this->Form->input('q', array('placeholder'=>__('Buscar...'), 'class'=>'form-control','label'=>false,'div'=>false,'value'=>$q)) ?>            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
			<a class="btn btn-info pull-right" href="<?php echo $this->Html->url(array('controller'=>$this->request->controller,'action'=>'add')); ?>">
			    <?php echo __('Adicionar'); ?>			</a>
        <?php echo $this->Form->end(); ?>    </div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-body table-responsive no-padding">
				<?php if(empty($categories) && !empty($this->request->query['q'])) : ?>
							<script type='text/javascript'>$(function(){demo.showNotification('<?php echo __('No se encontraron datos');?>', 'top','center','info');})</script>
				<?php endif; ?>
				<table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
					<thead class="text-primary">
						<tr>						
								<th><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
								<th><?php echo $this->Paginator->sort('description', __('Description')); ?></th>
								<th><?php echo $this->Paginator->sort('state', __('State')); ?></th>
								<th><?php echo __('Acciones'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php 
				 if(!empty($categories)): ?>
<?php 					 foreach ($categories as $category): ?>
							<tr>
										<td><?php echo h($category['Category']['name']); ?>&nbsp;</td>
								<td><?php echo h($category['Category']['description']); ?>&nbsp;</td>
								<td> <?php echo $category['Category']['state'] == 1 ? __('Activo') : __('Inactivo') ;?> </td>									<td class="td-actions">
									    <a rel="tooltip" href="<?php echo $this->Html->url(array('action' => 'view',$category['Category']['id'])); ?>" title="<?php echo __('Ver'); ?>" class="btn btn-info  btn-xs">
									        <i class="fa fa-eye"></i>
									    </a>
									    <a rel="tooltip" href="<?php echo $this->Html->url(array('action' => 'edit',$category['Category']['id'])); ?>" title="<?php echo __('Editar'); ?>" class="btn btn-success btn-xs">
									        <i class="fa fa-edit"></i>
									    </a>
									    <a rel="tooltip" href="<?php echo $this->Html->url(array('action' => 'delete',$category['Category']['id'])); ?>" title="<?php echo $category['Category']['state'] == 1 ? __('Deshabilitar') : __('Habilitar'); ?>" class="btn btn-danger btn-xs changeState">
									    	<?php if($category['Category']['state'] == 1): ?>									        <i class="fa fa-times-circle-o"></i>
									        <?php else:  ?>									        <i class="fa fa-check-circle"></i>
									        <?php endif;  ?>									    </a>
									</td>
							</tr>
					<?php endforeach; ?>
					<?php else: ?>
							<tr><td class='text-center' colspan='<?php echo 1; ?>'>No existen resultados</td><tr>
							<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
		<p>
			<small>
				<?php
					echo $this->Paginator->counter(array(
					'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count} en total, comenzando en {:start}, terminando en {:end}')
					));
				?>
			</small>
		</p>

		<ul class="pagination pagination-info">
			<?php
					echo $this->Paginator->prev('< ' . __('Ant'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
					echo $this->Paginator->next(__('Sig') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				?>
		</ul>
	</div>
</div>
