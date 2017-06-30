<div class="row">
    <section class="content-header">
      <h1><?php echo __('Visualizando').' '.__('Category'); ?></h1>
    </section>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-sm btn-fill btn-success"  href="<?php echo $this->Html->url(array('action'=>'index'));?>">
            <i class="fa fa-list-alt"></i>
            <?php echo __('Listar'); ?>
        </a>

        <a class="btn btn-sm btn-fill btn-info" href="<?php echo $this->Html->url(array('action'=>'edit',$category['Category']['id']));?>">
            <i class="fa fa-edit"></i>
            <?php echo __('Editar'); ?>
        </a>

        <a class="btn btn-sm btn-fill btn-warning"  href="<?php echo $this->Html->url(array('action'=>'add'));?>">
            <i class="fa fa-plus-circle"></i>
            <?php echo __('Adicionar'); ?>
        </a>
        <a rel="tooltip" href="<?php echo $this->Html->url(array('action' => 'delete',$category['Category']['id'])); ?>" class="btn btn-danger btn-sm changeState">
            <?php if($category['Category']['state'] == 1): ?>                <i class="fa fa-times-circle-o"></i> Deshabilitar
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
											<?php echo h($category['Category']['name']); ?>&nbsp;
										</td>
									</tr>

									<tr>
										<td><?php echo __('Description'); ?></td>
										<td>
											<?php echo h($category['Category']['description']); ?>&nbsp;
										</td>
									</tr>

									<tr>
										<td><?php echo __('State'); ?></td>
								<td> <?php echo $category['Category']['state'] == 1 ? __('Activo') : __('Inactivo') ;?> </td>									</tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>