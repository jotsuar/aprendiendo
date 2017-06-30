<div class="row">
    <section class="content-header">
      <h1><?php echo __('Visualizando').' '.__('Customer'); ?></h1>
    </section>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-sm btn-fill btn-success"  href="<?php echo $this->Html->url(array('action'=>'index'));?>">
            <i class="fa fa-list-alt"></i>
            <?php echo __('Listar'); ?>
        </a>

        <a class="btn btn-sm btn-fill btn-info" href="<?php echo $this->Html->url(array('action'=>'edit',$customer['Customer']['id']));?>">
            <i class="fa fa-edit"></i>
            <?php echo __('Editar'); ?>
        </a>

        <a class="btn btn-sm btn-fill btn-warning"  href="<?php echo $this->Html->url(array('action'=>'add'));?>">
            <i class="fa fa-plus-circle"></i>
            <?php echo __('Adicionar'); ?>
        </a>
        <a rel="tooltip" href="<?php echo $this->Html->url(array('action' => 'delete',$customer['Customer']['id'])); ?>" class="btn btn-danger btn-sm changeState">
            <?php if($customer['Customer']['state'] == 1): ?>                <i class="fa fa-times-circle-o"></i> Deshabilitar
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
										<td><?php echo __('Name'); ?></td>
										<td>
											<?php echo h($customer['Customer']['name']); ?>&nbsp;
										</td>
									</tr>

									<tr>
										<td><?php echo __('Last name'); ?></td>
										<td>
											<?php echo h($customer['Customer']['last_name']); ?>&nbsp;
										</td>
									</tr>

									<tr>
										<td><?php echo __('Telephone'); ?></td>
										<td>
											<?php echo h($customer['Customer']['telephone']); ?>&nbsp;
										</td>
									</tr>

									<tr>
										<td><?php echo __('Address'); ?></td>
										<td>
											<?php echo h($customer['Customer']['address']); ?>&nbsp;
										</td>
									</tr>

									<tr>
										<td><?php echo __('Document'); ?></td>
										<td>
											<?php echo h($customer['Customer']['document']); ?>&nbsp;
										</td>
									</tr>

									<tr>
										<td><?php echo __('Gender'); ?></td>
										<td>
											<?php echo h($customer['Customer']['gender']); ?>&nbsp;
										</td>
									</tr>

									<tr>
										<td><?php echo __('State'); ?></td>
								<td> <?php echo $customer['Customer']['state'] == 1 ? __('Activo') : __('Inactivo') ;?> </td>									</tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>