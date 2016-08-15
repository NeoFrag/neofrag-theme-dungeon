<div class="panel-box">
	<div class="box-heading">
		<div class="box-title">
			<div class="icon"><i class="fa fa-pencil"></i></div>
			<div class="title"><a href="<?php echo url('news/'.$data['news_id'].'/'.url_title($data['title']).'.html'); ?>"><?php echo $data['title']; ?></a></div>
		</div>
		<div class="box-infos">
			<div class="autor">
				<div class="pull-left comments"><i class="fa fa-comments-o"></i><br /><?php echo $NeoFrag->comments->count_comments('news', $data['news_id']); ?></div>
				<div class="pull-right">
					<div class="share-content">
						<div class="share">
							<span>Partager</span>
							<i class="fa fa-share-alt"></i>
						</div>
						<div class="share alt">
							<a href="https://www.facebook.com/sharer.php?u=<?php echo $_SERVER['HTTP_HOST'].$this->config->base_url; ?>news/<?php echo $data['news_id']; ?>/<?php echo url_title($data['title']); ?>.html" target="_blank"><i class="fa fa-facebook"></i></a>
							<a href="https://twitter.com/share?url=<?php echo $_SERVER['HTTP_HOST'].$this->config->base_url; ?>news/<?php echo $data['news_id']; ?>/<?php echo url_title($data['title']); ?>.html" target="_blank"><i class="fa fa-twitter"></i></a>
							<a href="https://plus.google.com/share?url=<?php echo $_SERVER['HTTP_HOST'].$this->config->base_url; ?>news/<?php echo $data['news_id']; ?>/<?php echo url_title($data['title']); ?>.html" target="_blank"><i class="fa fa-google-plus"></i></a>
						</div>
					</div>
				</div>
				<ul class="list-inline">
					<li><i class="fa fa-calendar"></i> Date :&nbsp;&nbsp;<span class="date"><?php echo timetostr('%e %b %Y', $data['date']); ?></span></li>
					<li><i class="fa fa-user"></i> Par :&nbsp;&nbsp;<?php echo $NeoFrag->user->link($data['user_id'], $data['username']); ?></li>
				</ul>
			</div>
		</div>
	</div>
	<?php if ($data['image']): ?>
		<a href="<?php echo url('news/'.$data['news_id'].'/'.url_title($data['title'].'.html')); ?>"><img class="img-responsive" src="<?php echo path($data['image']); ?>" alt="" /></a>
	<?php endif; ?>
	<div class="box-body">
		<?php echo bbcode($data['introduction']).($data['content'] ? '<hr />'.bbcode($data['content']) : ''); ?>
		<?php if ($data['tags']): ?>
			<hr />
			<?php foreach (explode(',', $data['tags']) as $tag): ?>
				<a class="label label-default news-tags" href="<?php echo url('news/tag/'.url_title($tag).'.html'); ?>"><i class="fa fa-tag"></i> <?php echo $tag; ?></a>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
