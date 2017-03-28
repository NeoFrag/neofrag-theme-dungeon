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
	public $version     = '1.4';
	public $nf_version  = '0.1.6';
	public $path        = __FILE__;
	public $zones       = ['Header', 'Avant-contenu', 'Contenu', 'Post-contenu', 'Footer'];

	public function load()
	{
		$this	->css('style')
				->js('dungeon');

		return parent::load();
	}

	public function styles_row()
	{
		return $this->view('live_editor/row');
	}

	public function styles_widget()
	{
		return $this->view('live_editor/widget');
	}

	public function install($dispositions = [])
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
				->config('dungeon_social_twitch', '#')
				->config('dungeon_social_behance', '#')
				->config('dungeon_social_deviantart', '#')
				->config('dungeon_social_dribble', '#')
				->config('dungeon_social_flickr', '#')
				->config('dungeon_social_github', '#')
				->config('dungeon_social_instagram', '#')
				->config('dungeon_social_youtube', '#')
				->config('dungeon_background', 0, 'int')
				->config('dungeon_header', 0, 'int')
				->config('dungeon_logo', 0, 'int');

		$dispositions['*']['Header'] = [
			$this->row(
					$this->col(
						$this->panel_widget($this->db->insert('nf_widgets', [
							'widget'   => 'header',
							'type'     => 'index',
							'settings' => serialize([
								'align'             => 'text-left',
								'title'             => '',
								'description'       => '',
								'color-title'       => '',
								'color-description' => ''
							])
						]))
					)
				)
				->style('row-default'),
			$this->row(
					$this->col(
						$this->panel_widget($this->db->insert('nf_widgets', [
							'widget'   => 'navigation',
							'type'     => 'index',
							'settings' => serialize([
								'display' => TRUE,
								'links'   => [
									[
										'title' => 'Accueil',
										'url'   => ''
									],
									[
										'title' => 'Actualit&eacute;s',
										'url'   => 'news'
									],
									[
										'title' => 'Forum',
										'url'   => 'forum'
									],
									[
										'title' => '&Eacute;quipes',
										'url'   => 'teams'
									],
									[
										'title' => 'Galerie',
										'url'   => 'gallery'
									],
									[
										'title' => 'Membres',
										'url'   => 'members'
									],
									[
										'title' => 'Contact',
										'url'   => 'contact'
									]
								]
							])
						]))
					)
				)
				->style('row-dark')
		];

		$dispositions['/']['Avant-contenu'] = [
			$this->row(
					$this->col(
						$this->panel_widget($this->db->insert('nf_widgets', [
							'widget'   => 'slider',
							'type'     => 'index'
						]))
					)
				)
				->style('row-default')
		];

		$dispositions['*']['Avant-contenu'] = [];

		$dispositions['*']['Contenu'] = [
			$this->row(
				$this->col(
						$this->panel_widget($this->db->insert('nf_widgets', [
							'widget' => 'module',
							'type'   => 'index'
						]))
					)
					->size('col-md-8'),
				$this->col(
						$this->panel_widget($this->db->insert('nf_widgets', [
								'widget' => 'user',
								'type'   => 'index'
							]))
							->color('color'),
						$this->panel_widget($this->db->insert('nf_widgets', [
								'widget' => 'members',
								'type'   => 'online'
							]))
							->color('default'),
						$this->panel_widget($this->db->insert('nf_widgets', [
								'widget' => 'news',
								'type'   => 'categories'
							]))
							->color('default'),
						$this->panel_widget($this->db->insert('nf_widgets', [
								'widget'   => 'talks',
								'type'     => 'index',
								'settings' => serialize([
									'talk_id' => 2
								])
							]))
							->color('header')
				)
				->size('col-md-4')
			)
			->style('row-default')
		];

		foreach (['forum/*', 'news/_news/*', 'user/*'] as $page)
		{
			$dispositions[$page]['Contenu'] = [
				$this->row(
						$this->col(
							$this->panel_widget($this->db->insert('nf_widgets', [
								'widget' => 'breadcrumb',
								'type'   => 'index'
							]))
						)
					)
					->style('row-default'),
				$this->row(
						$this->col(
							$this->panel_widget($this->db->insert('nf_widgets', [
								'widget' => 'module',
								'type'   => 'index'
							]))
						)
					)
					->style('row-default')
			];
		}

		$dispositions['forum/*']['Post-contenu'] = [
			$this->row(
				$this->col(
					$this->panel_widget($this->db->insert('nf_widgets', [
						'widget' => 'forum',
						'type'   => 'statistics'
					]))
					->color('header')
				)
				->size('col-md-4'),
				$this->col(
					$this->panel_widget($this->db->insert('nf_widgets', [
						'widget' => 'forum',
						'type'   => 'activity'
					]))
					->color('header')
				)
				->size('col-md-8')
			)
			->style('row-default')
		];

		$dispositions['*']['Post-contenu'] = [];

		$dispositions['*']['Footer'] = [];

		return parent::install($dispositions);
	}

	public function uninstall($remove = TRUE)
	{
		$this->file ->delete($this->config->dungeon_background)
					->delete($this->config->dungeon_header)
					->delete($this->config->dungeon_logo);

		$this->db->where('name LIKE', 'dungeon_%')->delete('nf_settings');

		return parent::uninstall($remove);
	}
}

/*
Dungeon theme 1.4 for NeoFrag Alpha 0.1.6
./themes/dungeon/dungeon.php
*/