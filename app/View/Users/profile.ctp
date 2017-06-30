	<div class="col-md-12">
		<div class="thumbnail">
			<img class="media-object" src="https://secure.gravatar.com/avatar/<?php echo md5(AuthComponent::user('email')) ?>?s=550&d=mm">
			<div class="caption center">
				<h3><?php echo AuthComponent::user('username')?></h3>
				<i class="fa fa-envelope"></i>
				<?php echo AuthComponent::user('email')?>
				<hr/>
			</div>
		</div>
	</div>
