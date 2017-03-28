<form action="<?php echo url('user/login'); ?>" method="post">
	<div class="form-group">
		<input type="text" class="form-control" name="<?php echo $data['form_id']; ?>[login]" placeholder="Identifiant" />
	</div>
	<div class="form-group">
		<input type="password" class="form-control" name="<?php echo $data['form_id']; ?>[password]" placeholder="Mot de passe" />
	</div>
	<div class="text-right">
		<input type="hidden" name="<?php echo $data['form_id']; ?>[redirect]" value="<?php echo $this->url->request; ?>" />
		<input type="hidden" name="<?php echo $data['form_id']; ?>[remember_me][]" value="on" />
	</div>
	<div class="text-right">
		<input type="submit" class="btn btn-default btn-login" value="Connexion" />
		<a href="<?php echo url('user'); ?>" class="btn btn-primary" data-toggle="tooltip" title="S'inscrire sur le site"><i class="fa fa-sign-in"></i></a>
		<a href="<?php echo url('user/lost-password'); ?>" class="btn btn-primary" data-toggle="tooltip" title="Mot de passe perdu ?"><i class="fa fa-question"></i></a>
	</div>
</form>