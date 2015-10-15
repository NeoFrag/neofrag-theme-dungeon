<?php if (!defined('NEOFRAG_CMS')) exit;
/**************************************************************************
Copyright © 2015 Michaël BILCOT & Jérémy VALENTIN

This file is part of NeoFrag.

NeoFrag is free software: you can redistribute it and/or modify
it under the terms of the GNU Lesser General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

NeoFrag is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public License
along with NeoFrag. If not, see <http://www.gnu.org/licenses/>.
**************************************************************************/

class o_m_teams_c_index extends m_teams_c_index
{
	public function index()
	{
		$panels = array();
		
		foreach ($this->model()->get_teams() as $team)
		{
			$panel = array(
				'title'   => '<a href="'.$this->config->base_url.'teams/'.$team['team_id'].'/'.$team['name'].'.html">'.$team['title'].'</a>',
				'content' => '<div class="panel-box" style="border-bottom: none;"><div class="box-heading"><div class="box-infos"><div class="autor"><ul class="list-inline" style="margin-left: 0;"><li><i class="fa fa-users"></i> '.($team['users'] > 1 ? 'Joueurs' : 'Joueur').' :&nbsp;&nbsp;<span style="color: #f0f0f0;">'.$team['users'].'</span></li><li><i class="fa fa-gamepad"></i> Jeu :&nbsp;&nbsp;<span style="color: #f0f0f0;">'.$team['game_title'].'</span></li></ul></div></div></div></div>',
				'body'    => FALSE
			);
			
			if ($team['image_id'])
			{
				$panel['content'] .= $this->load->view('teams', array(
					'team_id' => $team['team_id'],
					'name'    => $team['name'],
					'image'   => $team['image_id']
				));
			}
			
			if ($team['icon_id'] || $team['game_icon'])
			{
				$panel['title'] = '<img src="'.path($team['icon_id'] ?: $team['game_icon']).'" alt="" /> '.$panel['title'];
			}
			else
			{
				$panel['icon'] = 'fa-gamepad';
			}
			
			$panels[] = new Panel($panel);
		}
		
		if (empty($panels))
		{
			$panels[] = new Panel(array(
				'title'   => 'Équipes',
				'icon'    => 'fa-gamepad',
				'style'   => 'panel-info',
				'content' => '<div class="text-center">Aucune équipe n\'a été créée pour le moment</div>'
			));
		}

		return $panels;
	}
}

/*
Dungeon theme 1.0 for NeoFrag Alpha 0.1.2
./themes/dungeon/overrides/modules/teams/controllers/index.php
*/