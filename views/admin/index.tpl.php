<div class="tab-content">
	<div role="tabpanel" class="tab-pane fade in active" id="<?php echo $data['theme']->name; ?>-dashboard">
		<div class="row">
			<div class="col-md-12 col-lg-4">
				<img class="img-responsive thumbnail no-margin" src="<?php echo image($data['theme']->thumbnail); ?>" alt="" />
			</div>
			<div class="col-md-12 col-lg-8">
				<div class="space hidden-lg"></div>
				<dl class="dl-horizontal no-margin">
					<dt>Nom du thème</dt>
					<dd><?php echo $data['theme']->get_title(); ?></dd>
					<dt>Description</dt>
					<dd><?php echo $data['theme']->description; ?></dd>
					<dt>Version</dt>
					<dd><?php echo $data['theme']->version; ?></dd>
					<dt>Auteurs</dt>
					<dd><?php echo $data['theme']->author; ?></dd>
					<dt>Licence</dt>
					<dd><?php echo $data['theme']->licence; ?></dd>
				</dl>
			</div>
		</div>
	</div>
	<div role="tabpanel" class="tab-pane fade" id="<?php echo $data['theme']->name; ?>-settings">
		<?php echo $data['form_settings']; ?>
	</div>
	<div role="tabpanel" class="tab-pane fade" id="<?php echo $data['theme']->name; ?>-header">
		<?php echo $data['form_header']; ?>
	</div>
	<div role="tabpanel" class="tab-pane fade" id="<?php echo $data['theme']->name; ?>-background">
		<?php echo $data['form_background']; ?>
	</div>
	<div role="tabpanel" class="tab-pane fade" id="<?php echo $data['theme']->name; ?>-socials">
		<?php echo $data['form_socials']; ?>
	</div>
</div>