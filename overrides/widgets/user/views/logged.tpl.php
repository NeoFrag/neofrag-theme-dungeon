<div class="panel-body text-center">
	<h4 class="no-margin">Bienvenue, <a href="<?php echo url('user.html'); ?>"><?php echo $this->user('username'); ?></a></h4>
	<br />
	<a href="<?php echo url('user.html'); ?>"><img src="<?php echo $NeoFrag->user->avatar(); ?>" style="max-width: 150px;" class="img-circle" alt="" /></a>
</div>
<ul class="list-group">
	<li class="list-group-item">
		<i class="fa fa-user"></i> <a href="<?php echo url('user.html'); ?>">Mon espace</a>
	</li>
	<li class="list-group-item">
		<i class="fa fa-cogs"></i> <a href="<?php echo url('user/edit.html'); ?>">Gérer mon compte</a>
	</li>
	<li class="list-group-item">
		<i class="fa fa-eye"></i> <a href="<?php echo url('members/'.$this->user('user_id').'/'.url_title($this->user('username')).'.html'); ?>">Voir mon profil</a>
	</li>
	<?php if ($NeoFrag->user('admin')): ?>
	<li class="list-group-item">
		<i class="fa fa-dashboard"></i> <a href="<?php echo url('admin.html'); ?>">Administration</a>
	</li>
	<?php endif; ?>
</ul>