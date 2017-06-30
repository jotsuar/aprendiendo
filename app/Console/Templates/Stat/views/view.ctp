<div class="row">
    <section class="content-header">
      <h1><?php printf("<?php echo __('%s').' '.__('%s'); ?>", 'Visualizando', $singularHumanName); ?></h1>
    </section>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-sm btn-fill btn-success"  href="<?php echo "<?php echo \$this->Html->url(array('action'=>'index'));?>" ?>">
            <i class="fa fa-list-alt"></i>
            <?php echo "<?php echo __('Listar'); ?>\n"; ?>
        </a>

        <a class="btn btn-sm btn-fill btn-info" href="<?php echo "<?php echo \$this->Html->url(array('action'=>'edit',\${$singularVar}['{$modelClass}']['id']));?>" ?>">
            <i class="fa fa-edit"></i>
            <?php echo "<?php echo __('Editar'); ?>\n"; ?>
        </a>

        <a class="btn btn-sm btn-fill btn-warning"  href="<?php echo "<?php echo \$this->Html->url(array('action'=>'add'));?>" ?>">
            <i class="fa fa-plus-circle"></i>
            <?php echo "<?php echo __('Adicionar'); ?>\n"; ?>
        </a>
        <a rel="tooltip" href="<?php echo "<?php echo \$this->Html->url(array('action' => 'delete',\${$singularVar}['{$modelClass}']['id'])); ?>" ?>" class="btn btn-danger btn-sm changeState">
            <?php echo "<?php if(\${$singularVar}['{$modelClass}']['state'] == 1): ?>" ?>
                <i class="fa fa-times-circle-o"></i> Deshabilitar
            <?php echo "<?php  else: ?>"  ?> 
                <i class="fa fa-check-circle"></i> Habilitar
            <?php echo " <?php endif;  ?>" ?>                                      
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
                        <table class="table table-condensed"><?php echo "\n"; ?>
                            <tbody><?php echo "\n"; ?>
    							<?php
    								foreach ($fields as $field) {
    									if(in_array($field, array('id','created','modified'))){
                                            continue;
                                        } 
    									$isKey = false;
    									if (!empty($associations['belongsTo'])) {
    										foreach ($associations['belongsTo'] as $alias => $details) {
    											if ($field === $details['foreignKey']) {
                                                    $label = ucfirst(strtolower(Inflector::humanize($alias)));
    												$isKey = true;
    												echo "\n\t\t\t\t\t\t\t\t\t<tr>\n";
    												echo "\t\t\t\t\t\t\t\t\t\t<td><?php echo __('$label'); ?></td>\n";
    												echo "\t\t\t\t\t\t\t\t\t\t<td>\n\t\t\t\t\t\t\t\t\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}']), array('class' => '')); ?>&nbsp;\n\t\t\t\t\t\t\t\t\t\t</td>\n";
    												echo "\t\t\t\t\t\t\t\t\t</tr>\n";
    												break;
    											}
    										}
    									}
    									if ($isKey !== true) {
                                            $label = ucfirst(strtolower(Inflector::humanize($field)));
    										echo "\n\t\t\t\t\t\t\t\t\t<tr>\n";
    										echo "\t\t\t\t\t\t\t\t\t\t<td><?php echo __('$label'); ?></td>\n";
                                            if($field == "state"){
                                                echo "\t\t\t\t\t\t\t\t<td> <?php echo \${$singularVar}['{$modelClass}']['{$field}'] == 1 ? __('Activo') : __('Inactivo') ;?> </td>";
                                            }else{
                                                
                                            echo "\t\t\t\t\t\t\t\t\t\t<td>\n\t\t\t\t\t\t\t\t\t\t\t<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;\n\t\t\t\t\t\t\t\t\t\t</td>\n";
                                            }
                                            echo "\t\t\t\t\t\t\t\t\t</tr>\n";
    									}
    								}
                                    echo "\n";
    							?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>