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

class t_dungeon_c_admin extends Controller
{
	public function index($theme)
	{
		$this	->css('admin')
				->js('admin');
		
		$form_header = $this	->form
								->add_rules(array(
									'header' => array(
										'label'  => 'Image de fond',
										'value'  => $this->config->{'dungeon_header'},
										'type'   => 'file',
										'upload' => 'themes/dungeon/headers',
										'info'   => ' d\'image (max. '.(file_upload_max_size() / 1024 / 1024).' Mo)',
										'check'  => function($filename, $ext){
											if (!in_array($ext, array('gif', 'jpeg', 'jpg', 'png')))
											{
												return 'Veuiller choisir un fichier d\'image';
											}
										},
										'description' => 'Laisser vide pour utiliser l\'image par défaut du thème.'
									),
									'repeat' => array(
										'label'  => 'Répéter l\'image',
										'value'  => $this->config->dungeon_header_repeat,
										'values' => array(
											'no-repeat' => 'Non',
											'repeat-x'  => 'Horizontalement',
											'repeat-y'  => 'Verticalement',
											'repeat'    => 'Les deux'
										),
										'type'   => 'radio',
										'rules'  => 'required'
									),
									'positionX' => array(
										'label'  => 'Position',
										'value'  => explode(' ', $this->config->dungeon_header_position)[0],
										'values' => array(
											'left'   => 'Gauche',
											'center' => 'Centré',
											'right'  => 'Droite'
										),
										'type'   => 'radio',
										'rules'  => 'required'
									),
									'positionY' => array(
										'value'  => explode(' ', $this->config->dungeon_header_position)[1],
										'values' => array(
											'top'    => 'Haut',
											'center' => 'Milieu',
											'bottom' => 'Bas'
										),
										'type'   => 'radio',
										'rules'  => 'required'
									),
									'fixed' => array(
										'checked' => array('on' => $this->config->dungeon_header_attachment == 'fixed'),
										'values'  => array('on' => 'Image fixe'),
										'type'    => 'checkbox'
									),
									'color' => array(
										'label' => 'Couleur de fond',
										'value' => $this->config->dungeon_header_color,
										'type'  => 'colorpicker',
										'rules' => 'required'
									),
									'logo' => array(
										'label'  => 'Logo du site',
										'value'  => $this->config->dungeon_logo,
										'type'   => 'file',
										'upload' => 'themes/dungeon/logos',
										'info'   => ' d\'image (max. '.(file_upload_max_size() / 1024 / 1024).' Mo)',
										'check'  => function($filename, $ext){
											if (!in_array($ext, array('gif', 'jpeg', 'jpg', 'png')))
											{
												return 'Veuiller choisir un fichier d\'image';
											}
										},
										'description' => 'Le logo sera affiché dans le widget type "header", en remplacement du titre et slogan.'
									)
								))
								->add_submit('Enregistrer')
								->save();
		
		$form_background = $this->form
								->add_rules(array(
									'background' => array(
										'label'  => 'Image de fond',
										'value'  => $this->config->dungeon_background,
										'type'   => 'file',
										'upload' => 'themes/dungeon/backgrounds',
										'info'   => ' d\'image (max. '.(file_upload_max_size() / 1024 / 1024).' Mo)',
										'check'  => function($filename, $ext){
											if (!in_array($ext, array('gif', 'jpeg', 'jpg', 'png')))
											{
												return 'Veuiller choisir un fichier d\'image';
											}
										},
										'description' => 'Laisser vide pour utiliser l\'image par défaut du thème.'
									),
									'repeat' => array(
										'label'  => 'Répéter l\'image',
										'value'  => $this->config->dungeon_background_repeat,
										'values' => array(
											'no-repeat' => 'Non',
											'repeat-x'  => 'Horizontalement',
											'repeat-y'  => 'Verticalement',
											'repeat'    => 'Les deux'
										),
										'type'   => 'radio',
										'rules'  => 'required'
									),
									'positionX' => array(
										'label'  => 'Position',
										'value'  => explode(' ', $this->config->dungeon_background_position)[0],
										'values' => array(
											'left'   => 'Gauche',
											'center' => 'Centré',
											'right'  => 'Droite'
										),
										'type'   => 'radio',
										'rules'  => 'required'
									),
									'positionY' => array(
										'value'  => explode(' ', $this->config->dungeon_background_position)[1],
										'values' => array(
											'top'    => 'Haut',
											'center' => 'Milieu',
											'bottom' => 'Bas'
										),
										'type'   => 'radio',
										'rules'  => 'required'
									),
									'fixed' => array(
										'checked' => array('on' => $this->config->dungeon_background_attachment == 'fixed'),
										'values'  => array('on' => 'Image fixe'),
										'type'    => 'checkbox'
									),
									'color' => array(
										'label' => 'Couleur de fond',
										'value' => $this->config->dungeon_background_color,
										'type'  => 'colorpicker',
										'rules' => 'required'
									)
								))
								->add_submit('Enregistrer')
								->save();
								
		$form_settings = $this	->form
								->add_rules(array(
									'theme_color' => array(
										'label' => 'Couleur du thème',
										'value' => $this->config->dungeon_theme_color,
										'type'  => 'colorpicker',
										'description' => 'Couleur générale du thème',
										'rules' => 'required'
									),
									'font_color' => array(
										'label' => 'Couleur du texte',
										'value' => $this->config->dungeon_font_color,
										'type'  => 'colorpicker',
										'description' => 'Couleur appliquée au texte principal du thème',
										'rules' => 'required'
									),
									'font_size' => array(
										'label'  => 'Taille du texte',
										'value'  => $this->config->dungeon_font_size,
										'values' => array(
											'10px' => '10 px',
											'11px' => '11 px',
											'12px' => '12 px',
											'13px' => '13 px',
											'14px' => '14 px',
											'15px' => '15 px',
											'16px' => '16 px'
										),
										'type'   => 'select',
										'rules'  => 'required'
									),
									'navbar' => array(
										'checked' => array('on' => $this->config->dungeon_navbar_display),
										'values'  => array('on' => 'Rendre toujours visible la barre du haut'),
										'type'    => 'checkbox'
									),
								))
								->add_submit('Enregistrer')
								->save();
								
		$form_socials = $this	->form
								->add_rules(array(
									'facebook' => array(
										'label' => 'Facebook',
										'icon'  => 'fa-facebook',
										'value' => $this->config->dungeon_social_facebook,
										'type'  => 'text',
										'description' => 'Indiquez l\'url complet'
									),
									'twitter' => array(
										'label' => 'Twitter',
										'icon'  => 'fa-twitter',
										'value' => $this->config->dungeon_social_twitter,
										'type'  => 'text',
										'description' => 'Indiquez l\'url complet'
									),
									'google' => array(
										'label' => 'Google+',
										'icon'  => 'fa-google-plus',
										'value' => $this->config->dungeon_social_google,
										'type'  => 'text',
										'description' => 'Indiquez l\'url complet'
									),
									'steam' => array(
										'label' => 'Page Steam',
										'icon'  => 'fa-steam',
										'value' => $this->config->dungeon_social_steam,
										'type'  => 'text',
										'description' => 'Indiquez l\'url complet'
									),
									'twitch' => array(
										'label' => 'Twitch',
										'icon'  => 'fa-twitch',
										'value' => $this->config->dungeon_social_twitch,
										'type'  => 'text',
										'description' => 'Indiquez l\'url complet'
									),
									'dribble' => array(
										'label' => 'Dribbble',
										'icon'  => 'fa-dribbble',
										'value' => $this->config->dungeon_social_dribble,
										'type'  => 'text',
										'description' => 'Indiquez l\'url complet'
									),
									'behance' => array(
										'label' => 'Behance',
										'icon'  => 'fa-behance',
										'value' => $this->config->dungeon_social_behance,
										'type'  => 'text',
										'description' => 'Indiquez l\'url complet'
									),
									'deviantart' => array(
										'label' => 'DeviantArt',
										'icon'  => 'fa-deviantart',
										'value' => $this->config->dungeon_social_deviantart,
										'type'  => 'text',
										'description' => 'Indiquez l\'url complet'
									),
									'flickr' => array(
										'label' => 'Flickr',
										'icon'  => 'fa-flickr',
										'value' => $this->config->dungeon_social_flickr,
										'type'  => 'text',
										'description' => 'Indiquez l\'url complet'
									),
									'github' => array(
										'label' => 'Github',
										'icon'  => 'fa-github',
										'value' => $this->config->dungeon_social_github,
										'type'  => 'text',
										'description' => 'Indiquez l\'url complet'
									),
									'instagram' => array(
										'label' => 'Instagram',
										'icon'  => 'fa-instagram',
										'value' => $this->config->dungeon_social_instagram,
										'type'  => 'text',
										'description' => 'Indiquez l\'url complet'
									),
									'youtube' => array(
										'label' => 'Youtube',
										'icon'  => 'fa-youtube',
										'value' => $this->config->dungeon_social_youtube,
										'type'  => 'text',
										'description' => 'Indiquez l\'url complet'
									),
								))
								->add_submit('Enregistrer')
								->save();

		if ($form_header->is_valid($post))
		{
			if ($post['header'])
			{
				$this->config('dungeon_header', $post['header'], 'int');
			}
			else
			{
				$this->db->where('name', 'dungeon_header')->delete('nf_settings');
			}
			
			if ($post['logo'])
			{
				$this->config('dungeon_logo', $post['logo'], 'int');
			}
			else
			{
				$this->db->where('name', 'dungeon_logo')->delete('nf_settings');
			}
			
			$this	->config('dungeon_header_repeat', $post['repeat'])
					->config('dungeon_header_attachment', in_array('on', $post['fixed']) ? 'fixed' : 'scroll')
					->config('dungeon_header_position', $post['positionX'].' '.$post['positionY'])
					->config('dungeon_header_color', $post['color'])
					->config('dungeon_logo', $post['logo'], 'int')
					->config('nf_version_css', time());

			refresh();
		}
		else if ($form_background->is_valid($post))
		{
			if ($post['background'])
			{
				$this->config('dungeon_background', $post['background'], 'int');
			}
			else
			{
				$this->db->where('name', 'dungeon_background')->delete('nf_settings');
			}
			
			$this	->config('dungeon_background_repeat', $post['repeat'])
					->config('dungeon_background_attachment', in_array('on', $post['fixed']) ? 'fixed' : 'scroll')
					->config('dungeon_background_position', $post['positionX'].' '.$post['positionY'])
					->config('dungeon_background_color', $post['color'])
					->config('nf_version_css', time());

			refresh();
		}
		else if ($form_settings->is_valid($post))
		{
			$this	->config('dungeon_theme_color', $post['theme_color'])
					->config('dungeon_font_color', $post['font_color'])
					->config('dungeon_font_size', $post['font_size'])
					->config('dungeon_display', $post['display'])
					->config('dungeon_navbar_display', in_array('on', $post['navbar']), 'bool')
					->config('nf_version_css', time());

			refresh();
		}
		else if ($form_socials->is_valid($post))
		{
			$this	->config('dungeon_social_facebook', $post['facebook'])
					->config('dungeon_social_twitter', $post['twitter'])
					->config('dungeon_social_google', $post['google'])
					->config('dungeon_social_steam', $post['steam'])
					->config('dungeon_social_twitch', $post['twitch'])
					->config('dungeon_social_dribble', $post['dribble'])
					->config('dungeon_social_behance', $post['behance'])
					->config('dungeon_social_deviantart', $post['deviantart'])
					->config('dungeon_social_flickr', $post['flickr'])
					->config('dungeon_social_github', $post['github'])
					->config('dungeon_social_instagram', $post['instagram'])
					->config('dungeon_social_youtube', $post['youtube']);

			refresh();
		}
		
		return new Row(
			new Col(
				new Panel(array(
					'content' => $this->load->view('admin/menu', array(
						'theme_name' => $theme->name
					)),
					'body'    => FALSE
				))
				, 'col-md-3'
			),
			new Col(
				new Panel(array(
					'title'   => 'Dashboard',
					'icon'    => 'fa-dashboard',
					'content' => $this->load->view('admin/index', array(
						'theme'           => $theme,
						'form_header'     => $form_header->display(),
						'form_background' => $form_background->display(),
						'form_settings'   => $form_settings->display(),
						'form_socials'    => $form_socials->display()
					))
				))
				, 'col-md-9'
			)
		);
	}
}

/*
Dungeon template 1.3 for NeoFrag Alpha 0.1.5
./themes/dungeon/dungeon.php
*/