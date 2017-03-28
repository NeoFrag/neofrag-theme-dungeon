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
		$panels = [];
		
		foreach ($this->model()->get_teams() as $team)
		{
			$body = '<div class="panel-box" style="border-bottom: none;"><div class="box-heading"><div class="box-infos"><div class="autor"><ul class="list-inline" style="margin-left: 0;"><li><i class="fa fa-users"></i> '.($team['users'] > 1 ? 'Joueurs' : 'Joueur').' :&nbsp;&nbsp;<span style="color: #f0f0f0;">'.$team['users'].'</span></li><li><i class="fa fa-gamepad"></i> Jeu :&nbsp;&nbsp;<span style="color: #f0f0f0;">'.$team['game_title'].'</span></li></ul></div></div></div></div>';

			$panels[] = $this->panel()	->heading($team['title'], $team['icon_id'] ?: $team['game_icon'] ?: 'fa-gamepad', 'teams/'.$team['team_id'].'/'.$team['name'])
									->footer(icon('fa-users').' '.$this->lang('player', $team['users'], $team['users']))
									->body($body.($team['image_id'] ? '<a href="'.url('teams/'.$team['team_id'].'/'.$team['name']).'"><img class="img-responsive" src="'.path($team['image_id']).'" alt="" /></a>' : ''), FALSE);
		}

		if (empty($panels))
		{
			$panels[] = $this	->panel()
								->heading($this->lang('teams'), 'fa-gamepad')
								->body('<div class="text-center">'.$this->lang('no_team_yet').'</div>')
								->color('info');
		}

		return $panels;
	}
}

/*
Dungeon theme 1.4 for NeoFrag Alpha 0.1.6
./themes/dungeon/overrides/modules/teams/controllers/index.php
*/