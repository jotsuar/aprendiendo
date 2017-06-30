<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tienda - <?php echo __($this->params->params["controller"]) ?> </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php 
  	echo $this->Html->css('/bootstrap/css/bootstrap.min.css');
    if($this->params->params["action"] == "index"){
       echo $this->Html->css('/plugins/datatables/dataTables.bootstrap.css');      
    }
  	echo $this->Html->css('/dist/css/AdminLTE.min.css');
  	echo $this->Html->css('/dist/css/skins/_all-skins.min.css');
  	echo $this->Html->css('font-awesome.min.css');
    echo $this->Html->css('ionicons.min.css');
    echo $this->Html->css('sweetalert');
    echo $this->Html->css('/plugins/Parsley/parsley');
  	echo $this->Html->css('main.css?'.time());
  ?>
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <?php echo $this->Session->flash(); ?>
  <?php if(AuthComponent::user("id")): ?>
	   <?php echo $this->element("header") ?>
	   <?php echo $this->element("left_column") ?>
  <?php endif; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <!-- <h3 class="box-title">Title</h3> -->
        </div>
        <div class="box-body">
         <?php echo $this->fetch('content'); ?>
        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <?php if(AuthComponent::user("id")): ?>
    <?php echo $this->element("footer") ?>
    <?php echo $this->element("right_column") ?>
  <?php endif; ?>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php 
	echo $this->Html->script('/plugins/jQuery/jquery-2.2.3.min.js');
	echo $this->Html->script('/bootstrap/js/bootstrap.min.js');
	echo $this->Html->script('bootstrap-notify.min');
	echo $this->Html->script('/plugins/slimScroll/jquery.slimscroll.min.js');
	echo $this->Html->script('/plugins/fastclick/fastclick.js');
  echo $this->Html->script('/dist/js/app.min.js');
	echo $this->Html->script('sweetalert.min');
  echo $this->Html->script('/dist/js/demo.js');
  echo $this->Html->script('/plugins/Parsley/parsley.min');
	echo $this->Html->script('/plugins/Parsley/i18n/es');

  if($this->params->params["action"] === "index"){
      echo $this->Html->script('/plugins/datatables/jquery.dataTables.min');
      echo $this->Html->script('/plugins/datatables/dataTables.bootstrap.min');
  }

  echo $this->Html->script('system');
 	//echo $this->Html->script('custom.js?'.time());
 ?>
  
  <script type="text/javascript" charset="utf-8" >
    
    SystemJS.config({
      baseURL: "/",
    });
    SystemJS.import('<?php echo $this->Html->url("/js/script.js?".time()) ?> ');
   
  </script>

  <?php
    // echo $this->Html->script('script.js?'.time());

   ?>

</body>
</html>
