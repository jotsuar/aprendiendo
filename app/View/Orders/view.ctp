<div class="row">
    <section class="content-header">
      <h1><?php echo __('Visualizando').' '.__('Order'); ?></h1>
    </section>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-sm btn-fill btn-success"  href="<?php echo $this->Html->url(array('action'=>'index'));?>">
            <i class="fa fa-list-alt"></i>
            <?php echo __('Listar'); ?>
        </a>

        <a class="btn btn-sm btn-fill btn-info" href="<?php echo $this->Html->url(array('action'=>'edit',$order['Order']['id']));?>">
            <i class="fa fa-edit"></i>
            <?php echo __('Editar'); ?>
        </a>

        <a class="btn btn-sm btn-fill btn-warning"  href="<?php echo $this->Html->url(array('action'=>'add'));?>">
            <i class="fa fa-plus-circle"></i>
            <?php echo __('Adicionar'); ?>
        </a>
        <a rel="tooltip" href="<?php echo $this->Html->url(array('action' => 'delete',$order['Order']['id'])); ?>" class="btn btn-danger btn-sm changeState">
            <?php if($order['Order']['state'] == 1): ?>                <i class="fa fa-times-circle-o"></i> Deshabilitar
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
										<td><?php echo __('Date'); ?></td>
										<td>
											<?php echo h($order['Order']['date']); ?>&nbsp;
										</td>
									</tr>

									<tr>
										<td><?php echo __('Total'); ?></td>
										<td>
											<?php echo h($order['Order']['total']); ?>&nbsp;
										</td>
									</tr>

									<tr>
										<td><?php echo __('User'); ?></td>
										<td>
											<?php echo $this->Html->link($order['User']['name'], array('controller' => 'users', 'action' => 'view', $order['User']['id']), array('class' => '')); ?>&nbsp;
										</td>
									</tr>

									<tr>
										<td><?php echo __('Customer'); ?></td>
										<td>
											<?php echo $this->Html->link($order['Customer']['name'], array('controller' => 'customers', 'action' => 'view', $order['Customer']['id']), array('class' => '')); ?>&nbsp;
										</td>
									</tr>

									<tr>
										<td><?php echo __('State'); ?></td>
								<td> <?php echo $order['Order']['state'] == 1 ? __('Activo') : __('Inactivo') ;?> </td>									</tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>