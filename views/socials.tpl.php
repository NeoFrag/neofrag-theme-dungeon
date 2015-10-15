<div class="btn-group" style="margin-top: 12px;" role="group">
<?php
	foreach (array(
		'dungeon_social_facebook'   => array('Facebook',   'fa-facebook'),
		'dungeon_social_twitter'    => array('Twitter',    'fa-twitter'),
		'dungeon_social_google'     => array('Google+',    'fa-google-plus'),
		'dungeon_social_steam'      => array('Steam',      'fa-steam'),
		'dungeon_social_twitch'     => array('Twitch',     'fa-twitch'),
		'dungeon_social_dribble'    => array('Dribbble',   'fa-dribbble'),
		'dungeon_social_behance'    => array('Behance',    'fa-behance'),
		'dungeon_social_deviantart' => array('DeviantArt', 'fa-deviantart'),
		'dungeon_social_flickr'     => array('Flickr',     'fa-flickr'),
		'dungeon_social_github'     => array('GitHub',     'fa-github'),
		'dungeon_social_instagram'  => array('Instagram',  'fa-instagram'),
		'dungeon_social_youtube'    => array('Youtube',    'fa-youtube')
	) as $var => $social)
	{
		list($title, $icon) = $social;
		
		if ($NeoFrag->config->$var)
		{
			echo '<a href="'.$NeoFrag->config->$var.'" data-toggle="tooltip" title="'.$title.'" data-container="body" class="btn btn-default btn-xs">'.icon($icon).'</a>';
		}
	}
?>
</div>