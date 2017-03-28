<nav class="navbar navbar-default<?php echo $this->config->dungeon_navbar_display ? ' navbar-fixed-top' : ''; ?> navbar-user">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#user-navbar" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php if ($this->access->admin()): ?>
			<a href="<?php echo url('admin'); ?>" class="navbar-brand"><?php echo icon('fa-dashboard'); ?></a>
			<?php endif; ?>
		</div>
		<div class="collapse navbar-collapse" id="user-navbar">
			<?php if ($this->user()): ?>
			<p class="navbar-text">Bienvenue <a href="<?php echo url('user'); ?>"><?php echo $this->user('username'); ?></a></p>
			<ul class="nav navbar-nav navbar-right navbar-account">
				<li class="login dropdown">
					<a href="#" class="dropdown-toggle" style="padding-left: 64px !important;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						<?php echo $this->user->avatar($this->user('avatar'), $this->user('sex')); ?> Mon compte <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo url('user'); ?>"><i class="fa fa-user fa-fw"></i> Mon espace</a></li>
						<li><a href="<?php echo url('user/edit'); ?>"><i class="fa fa-cogs fa-fw"></i> Gérer mon compte</a></li>
						<?php if ($this->user('admin')): ?>
						<li><a href="<?php echo url('admin'); ?>"><i class="fa fa-dashboard fa-fw"></i> Administration</a></li>
						<?php endif; ?>
					</ul>
				</li>
				<li class="active"><a href="<?php echo url('user/logout'); ?>"><i class="fa fa-close fa-fw"></i></a></li>
			</ul>
			<?php else: ?>
			<p class="navbar-text" style="padding-left: 0 !important; margin-left: 0 !important">Bienvenue sur le site <a href="<?php echo url(); ?>"><?php echo $this->config->nf_name; ?></a></p>
			<ul class="nav navbar-nav navbar-right navbar-account">
				<li class="login"><a href="<?php echo url('user'); ?>"><?php echo icon('fa-unlock-alt'); ?> Espace membre</a></li>
				<li class="active"><a href="<?php echo url('user'); ?>"><?php echo icon('fa-ellipsis-v'); ?></a></li>
			</ul>
			<?php endif; ?>
		</div>
	</div>
</nav>