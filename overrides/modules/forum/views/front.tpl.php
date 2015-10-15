<div class="panel-box">
	<div class="box-heading">
		<div class="box-title">
			<div class="pull-right">
				<a href="#category-<?php echo $data['category_id']; ?>" class="btn btn-default btn-xs btn-collapse" style="margin: 14px;" role="button" data-toggle="collapse" aria-controls="category-<?php echo $data['category_id']; ?>">
					<i class="fa fa-angle-down fa-fw"></i>
				</a>
			</div>
			<div class="icon"><i class="fa fa-navicon"></i></div>
			<div class="title"><?php echo $data['title']; ?></div>
		</div>
		<div class="collapse in" id="category-<?php echo $data['category_id']; ?>">
			<table class="table table-hover table-responsive">
				<tbody class="forum-content">
					<?php foreach ($data['forums'] as $forum): ?>
					<tr>
						<td class="text-center">
							<?php echo $forum['icon']; ?>
						</td>
						<td class="col-md-6">
							<h4 class="no-margin"><a href="<?php echo url('forum/'.$forum['forum_id'].'/'.url_title($forum['title']).'.html'); ?>"><?php echo $forum['title']; ?></a></h4>
							<?php if ($forum['description']) echo '<div style="text-transform: none;">'.$forum['description'].'</div>'; ?>
							<?php
							if (!empty($forum['subforums'])):
								echo '<ul class="subforums">';
								foreach ($forum['subforums'] as $subforum):
									echo '<li>'.
											$subforum['icon'].' <a href="'.url('forum/'.$subforum['forum_id'].'/'.url_title($subforum['title']).'.html').'">'.$subforum['title'].'</a>'.
										'</li>';
								endforeach;
								echo '</ul>';
							endif;
							?>
						</td>
						<td class="col-md-2">
							<?php if ($forum['url']): ?>
							<span class="stats"><i class="fa fa-globe fa-fw"></i> <?php echo $forum['redirects']; ?> <span class="hidden-xs"><?php echo $forum['redirects'] > 1 ? 'redirections' : 'redirection'; ?></span></span>
							<?php else: ?>
							<span class="stats"><i class="fa fa-server fa-fw"></i> <?php echo $forum['count_topics']; ?> <span class="hidden-xs"><?php echo $forum['count_topics'] > 1 ? 'sujets' : 'sujet'; ?></span></span>
							<span class="stats"><i class="fa fa-comment-o fa-fw"></i> <?php echo $forum['count_messages']; ?> <span class="hidden-xs"><?php echo $forum['count_messages'] > 1 ? 'réponses' : 'réponse'; ?></span></span>
							<?php endif; ?>
						</td>
						<td class="col-md-4">
							<?php if (!$forum['url']): ?>
							<?php if ($forum['last_title']): ?>
							<div class="media last-message">
								<div class="media-left">
									<img class="media-object img-circle" style="max-height: 40px; max-width: 40px;" src="<?php echo $NeoFrag->user->avatar($forum['avatar'], $forum['sex']); ?>" alt="" />
								</div>
								<div class="media-body">
									<h5 class="media-heading"><a href="<?php echo url('forum/topic/'.$forum['topic_id'].'/'.url_title($forum['last_title']).($forum['last_count_messages'] > $NeoFrag->config->forum_messages_per_page ? '/page/'.ceil($forum['last_count_messages'] / $NeoFrag->config->forum_messages_per_page) : '').'.html#message_'.$forum['last_message_id']); ?>"><i class="fa fa-comment-o"></i> <?php echo str_shortener($forum['last_title'], 40); ?></a></h5>
									<?php echo icon('fa-user').' '.($forum['user_id'] ? $NeoFrag->user->link($forum['user_id'], $forum['username']) : '<i>Visiteur</i>').' '.icon('fa-clock-o').' '.time_span($forum['last_message_date']); ?>
								</div>
							</div>
							<?php else: ?>
							<div style="margin-top: 15px;">Pas de message</div>
							<?php endif; endif; ?>
						</td>
					</tr>
					<?php endforeach; ?>
					<?php if (empty($data['forums'])): ?>
					<tr class="forum-empty text-center">
						<td colspan="4"><h5>Aucun forum dans cette catégorie</h5></td>
					</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>