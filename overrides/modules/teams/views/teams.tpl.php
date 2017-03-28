<a class="effect-link" href="<?php echo url('teams/'.$data['team_id'].'/'.url_title($data['name'])); ?>">
	<div class="effect-hover">
		<div class="effect-hover-content">
			<i class="fa fa-eye"></i> Découvrir l'équipe...
		</div>
	</div>
	<img src="<?php echo path($data['image']); ?>" class="img-responsive" alt="" />
</a>