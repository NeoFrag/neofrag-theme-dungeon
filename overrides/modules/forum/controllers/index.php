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
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public License
along with NeoFrag. If not, see <http://www.gnu.org/licenses/>.
**************************************************************************/

class o_m_forum_c_index extends m_forum_c_index
{
	public function index()
	{
		$panels = [];
		
		foreach ($this->model()->get_categories() as $category)
		{
			$panels[] = $this->panel()->body($this->view('front', $category), FALSE);
		}
		
		if (empty($panels))
		{
			$panels[] = $this	->panel()
								->heading($this->lang('forum'), 'fa-comments')
								->body('<div class="text-center">'.$this->lang('no_forum').'</div>')
								->color('info');
		}
		
		if ($this->user())
		{
			$actions = $this->panel()
							->body('<a class="btn btn-default" href="'.url('forum/mark-all-as-read').'" data-toggle="tooltip" title="'.$this->lang('mark_all_as_read').'">'.icon('fa-eye').'</a>', FALSE)
							->color('back text-right');

			array_unshift($panels, $panels[] = $actions);
		}

		return $panels;
	}
}

/*
Dungeon theme 1.4 for NeoFrag Alpha 0.1.6
./themes/dungeon/overrides/modules/forum/controllers/index.php
*/