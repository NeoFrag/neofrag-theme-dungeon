<?php if (!defined('NEOFRAG_CMS')) exit;
/**************************************************************************
Copyright © 2015 Michaël BILCOT & Jérémy VALENTIN

Template by Alessandro STIGLIANI <https://dribbble.com/nxalessandro>

Dungeon Theme is under the terms of the Creative Commons CC BY-NC-SA 4.0
<http://creativecommons.org/licenses/by-nc-sa/4.0/legalcode>

You are free to:

    Share — copy and redistribute the material in any medium or format
    Adapt — remix, transform, and build upon the material.

    The licensor cannot revoke these freedoms as long as you follow the
    license terms.

Under the following terms:

    Attribution — You must give appropriate credit, provide a link to the
    license, and indicate if changes were made. You may do so in any
    reasonable manner, but not in any way that suggests the licensor
    endorses you or your use.

    NonCommercial — You may not use the material for commercial purposes.

    ShareAlike — If you remix, transform, or build upon the material, you
    must distribute your contributions under the same license as the
    original.
**************************************************************************/

class t_dungeon extends Theme
{
	public $title       = 'Dungeon';
	public $description = 'Thème orienté jeux vidéo, facilement personnalisable avec un choix de couleur illimité. Créé par <a href="https://dribbble.com/NxAlessandro" target="_blank">Alessandro STIGLIANI</a> avec une mise en page moderne, il s\'adapte pour tout type d\'univers !';
	public $thumbnail   = 'themes/dungeon/images/thumbnail.jpg';
	public $link        = 'https://github.com/NeoFragCMS/neofrag-theme-dungeon';
	public $author      = '<a href="https://dribbble.com/NxAlessandro" target="_blank">Alessandro STIGLIANI</a>';
	public $licence     = '<a href="http://creativecommons.org/licenses/by-nc-sa/4.0/legalcode" target="_blank">Creative Commons CC BY-NC-SA 4.0</a>';
	public $version     = '1.2.1';
	public $nf_version  = '0.1.4.1';
	public $path        = __FILE__;
	public $zones       = array('Header', 'Avant-contenu', 'Contenu', 'Post-contenu', 'Footer');

	public function load()
	{
		$this	->css('style')
				->js('dungeon');

		return parent::load();
	}

	public function styles_row()
	{
		return $this->load->view('live_editor/row');
	}

	public function styles_widget()
	{
		return $this->load->view('live_editor/widget');
	}

	public function install($dispositions = array())
	{
		$this	->config('dungeon_background_repeat', 'repeat')
				->config('dungeon_background_attachment', 'scroll')
				->config('dungeon_background_position', 'center top')
				->config('dungeon_background_color', '#f0f0f0')
				->config('dungeon_header_repeat', 'no-repeat')
				->config('dungeon_header_attachment', 'scroll')
				->config('dungeon_header_position', 'center top')
				->config('dungeon_header_color', '#f0f0f0')
				->config('dungeon_theme_color', '#fcb73e')
				->config('dungeon_font_color', '#777777')
				->config('dungeon_font_size', '14px')
				->config('dungeon_navbar_display', 'off')
				->config('dungeon_social_facebook', '#')
				->config('dungeon_social_twitter', '#')
				->config('dungeon_social_google', '#')
				->config('dungeon_social_steam', '#')
				->config('dungeon_social_twitch', '#');

		$dispositions['*']['Header'] = array(
			new Row(
				new Col(
					new Widget_View(array(
						'widget_id' => $this->db->insert('nf_widgets', array(
							'widget'   => 'header',
							'type'     => 'index',
							'settings' => serialize(array(
								'align'             => 'text-left',
								'title'             => '',
								'description'       => '',
								'color-title'       => '',
								'color-description' => ''
							))
						))
					))
				, 'col-md-12')
			, 'row-default'),
			new Row(
				new Col(
					new Widget_View(array(
						'widget_id' => $this->db->insert('nf_widgets', array(
							'widget'   => 'navigation',
							'type'     => 'index',
							'settings' => serialize(array(
								'display' => TRUE,
								'links'   => array(
									array(
										'title' => 'Accueil',
										'url'   => 'index.html'
									),
									array(
										'title' => 'Actualit&eacute;s',
										'url'   => 'news.html'
									),
									array(
										'title' => 'Forum',
										'url'   => 'forum.html'
									),
									array(
										'title' => '&Eacute;quipes',
										'url'   => 'teams.html'
									),
									array(
										'title' => 'Galerie',
										'url'   => 'gallery.html'
									),
									array(
										'title' => 'Membres',
										'url'   => 'members.html'
									),
									array(
										'title' => 'Contact',
										'url'   => 'contact.html'
									)
								)
							))
						))
					))
				, 'col-md-12')
			, 'row-dark')
		);

		$dispositions['/']['Avant-contenu'] = array(
			new Row(
				new Col(
					new Widget_View(array(
						'widget_id' => $this->db->insert('nf_widgets', array(
							'widget'   => 'slider',
							'type'     => 'index'
						))
					))
				, 'col-md-12')
			, 'row-default')
		);

		$dispositions['*']['Avant-contenu'] = array();

		$dispositions['*']['Contenu'] = array(
			new Row(
				new Col(new Widget_View(array(
					'widget_id' => $this->db->insert('nf_widgets', array(
						'widget' => 'module',
						'type'   => 'index'
					))
				)), 'col-md-8'),
				new Col(
						new Widget_View(array(
							'widget_id' => $this->db->insert('nf_widgets', array(
								'widget' => 'user',
								'type'   => 'index'
							)),
							'style' => 'panel-color'
						)),
						new Widget_View(array(
							'widget_id' => $this->db->insert('nf_widgets', array(
								'widget' => 'members',
								'type'   => 'online'
							)),
							'style' => 'panel-default'
						)),
						new Widget_View(array(
							'widget_id' => $this->db->insert('nf_widgets', array(
								'widget' => 'news',
								'type'   => 'categories'
							)),
							'style' => 'panel-default'
						)),
						new Widget_View(array(
							'widget_id' => $this->db->insert('nf_widgets', array(
								'widget'   => 'talks',
								'type'     => 'index',
								'settings' => serialize(array(
									'talk_id' => 2
								))
							)),
							'style' => 'panel-header'
						))
				, 'col-md-4')
			, 'row-default')
		);

		foreach (array('forum/*', 'news/_news/*', 'user/*') as $page)
		{
			$dispositions[$page]['Contenu'] = array(
				new Row(
					new Col(
						new Widget_View(array(
							'widget_id' => $this->db->insert('nf_widgets', array(
								'widget' => 'breadcrumb',
								'type'   => 'index'
							))
						)), 'col-md-12'
					), 'row-default'
				),
				new Row(
					new Col(
						new Widget_View(array(
							'widget_id' => $this->db->insert('nf_widgets', array(
								'widget' => 'module',
								'type'   => 'index'
							))
						)), 'col-md-12'
					), 'row-default'
				)
			);
		}

		$dispositions['forum/*']['Post-contenu'] = array(
			new Row(
				new Col(
					new Widget_View(array(
						'widget_id' => $this->db->insert('nf_widgets', array(
							'widget' => 'forum',
							'type'   => 'statistics'
						)),
						'style' => 'panel-default'
					)), 'col-md-4'
				),
				new Col(
					new Widget_View(array(
						'widget_id' => $this->db->insert('nf_widgets', array(
							'widget' => 'forum',
							'type'   => 'activity'
						)),
						'style' => 'panel-header'
					)), 'col-md-8'
				)
			, 'row-default')
		);

		$dispositions['*']['Post-contenu'] = array();

		$dispositions['*']['Footer'] = array();

		return parent::install($dispositions);
	}

	public function uninstall($remove = TRUE)
	{
		$this->load->library('file')->delete($this->config->dungeon_background)
									->delete($this->config->dungeon_header)
									->delete($this->config->dungeon_logo);

		$this->db->where('name LIKE', 'dungeon_%')->delete('nf_settings');

		return parent::uninstall($remove);
	}
}

/*
Dungeon theme 1.2.1 for NeoFrag Alpha 0.1.4.1
./themes/dungeon/dungeon.php
*/