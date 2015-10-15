<header>
	<?php echo $this->load->view('userbar'); ?>
	<?php if ($zone = $NeoFrag->output->display_zone(0)): ?>
	<div class="header-banner">
		<div class="container"><?php echo $zone; ?></div>
	</div>
	<?php endif; ?>
</header>
<?php if ($zone = $NeoFrag->output->display_zone(1)): ?>
<section id="avant-contenu">
	<div class="container">
		<?php echo $zone; ?>
	</div>
</section>
<?php endif; ?>
<?php if ($zone = $NeoFrag->output->display_zone(2)): ?>
<section id="contenu">
	<div class="container">
		<?php echo $zone; ?>
	</div>
</section>
<?php endif; ?>
<?php if ($zone = $NeoFrag->output->display_zone(3)): ?>
<section id="post-contenu">
	<div class="container">
		<?php echo $zone; ?>
	</div>
</section>
<?php endif; ?>
<footer>
	<div class="container">
		<?php echo $NeoFrag->output->display_zone(4); ?>
		<div class="row row-default">
			<div class="col-md-6">
				<div class="copyleft">Thème by <a href="https://dribbble.com/NxAlessandro" target="_blank">NxAlessandro</a> - Propulsé par <a href="http://www.neofrag.fr" target="_blank">NeoFrag</a> - © <?php echo date('Y'); ?> <span class="text-muted"><?php echo $this->config->nf_name; ?></span></div>
			</div>
			<div class="col-md-6 text-right">
				<?php echo $this->load->view('socials'); ?>
			</div>
		</div>
	</div>
</footer>