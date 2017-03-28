<div class="btn-group" style="margin-top: 12px;" role="group">
<?php
	foreach ([
		'dungeon_social_facebook'   => ['Facebook',   'fa-facebook'],
		'dungeon_social_twitter'    => ['Twitter',    'fa-twitter'],
		'dungeon_social_google'     => ['Google+',    'fa-google-plus'],
		'dungeon_social_steam'      => ['Steam',      'fa-steam'],
		'dungeon_social_twitch'     => ['Twitch',     'fa-twitch'],
		'dungeon_social_dribble'    => ['Dribbble',   'fa-dribbble'],
		'dungeon_social_behance'    => ['Behance',    'fa-behance'],
		'dungeon_social_deviantart' => ['DeviantArt', 'fa-deviantart'],
		'dungeon_social_flickr'     => ['Flickr',     'fa-flickr'],
		'dungeon_social_github'     => ['GitHub',     'fa-github'],
		'dungeon_social_instagram'  => ['Instagram',  'fa-instagram'],
		'dungeon_social_youtube'    => ['Youtube',    'fa-youtube']
	] as $var => $social)
	{
		list($title, $icon) = $social;
		
		if ($this->config->$var)
		{
			echo '<a href="'.$this->config->$var.'" data-toggle="tooltip" title="'.$title.'" data-container="body" class="btn btn-default btn-xs">'.icon($icon).'</a>';
		}
	}
?>
</div>