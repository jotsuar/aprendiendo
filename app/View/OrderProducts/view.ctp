<div class="row">
    <section class="content-header">
      <h1><?php echo __('Visualizando').' '.__('Order Product'); ?></h1>
    </section>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-sm btn-fill btn-success"  href="<?php echo $this->Html->url(array('action'=>'index'));?>">
            <i class="fa fa-list-alt"></i>
            <?php echo __('Listar'); ?>
        </a>

        <a class="btn btn-sm btn-fill btn-info" href="<?php echo $this->Html->url(array('action'=>'edit',$orderProduct['OrderProduct']['id']));?>">
            <i class="fa fa-edit"></i>
            <?php echo __('Editar'); ?>
        </a>

        <a class="btn btn-sm btn-fill btn-warning"  href="<?php echo $this->Html->url(array('action'=>'add'));?>">
            <i class="fa fa-plus-circle"></i>
            <?php echo __('Adicionar'); ?>
        </a>
        <a rel="tooltip" href="<?php echo $this->Html->url(array('action' => 'delete',$orderProduct['OrderProduct']['id'])); ?>" class="btn btn-danger btn-sm changeState">
            <?php if($orderProduct['OrderProduct']['state'] == 1): ?>                <i class="fa fa-times-circle-o"></i> Deshabilitar
            <?php  else: ?> 
                <i class="fa fa-check-circle"></i> Habilitar
             <?php endif;  ?>                                      
        </a>

    </div>
    <hr>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border"></div>
            <div class="box-body">  
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">   
                        <table class="table table-condensed">
                            <tbody>
    							
									<tr>
										<td><?php echo __('Order'); ?></td>
										<td>
											<?php echo $this->Html->link($orderProduct['Order']['id'], array('controller' => 'orders', 'action' => 'view', $orderProduct['Order']['id']), array('class' => '')); ?>&nbsp;
										</td>
									</tr>

									<tr>
										<td><?php echo __('Product'); ?></td>
										<td>
											<?php echo $this->Html->link($orderProduct['Product']['name'], array('controller' => 'products', 'action' => 'view', $orderProduct['Product']['id']), array('class' => '')); ?>&nbsp;
										</td>
									</tr>

									<tr>
										<td><?php echo __('Unit value'); ?></td>
										<td>
											<?php echo h($orderProduct['OrderProduct']['unit_value']); ?>&nbsp;
										</td>
									</tr>

									<tr>
										<td><?php echo __('Quantity'); ?></td>
										<td>
											<?php echo h($orderProduct['OrderProduct']['quantity']); ?>&nbsp;
										</td>
									</tr>

									<tr>
										<td><?php echo __('Total'); ?></td>
										<td>
											<?php echo h($orderProduct['OrderProduct']['total']); ?>&nbsp;
										</td>
									</tr>

									<tr>
										<td><?php echo __('State'); ?></td>
								<td> <?php echo $orderProduct['OrderProduct']['state'] == 1 ? __('Activo') : __('Inactivo') ;?> </td>									</tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>