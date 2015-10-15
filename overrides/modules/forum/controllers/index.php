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

class o_m_forum_c_index extends m_forum_c_index
{
	public function index()
	{
		$panels = array();
		
		foreach ($this->model()->get_categories() as $category)
		{
			$panels[] = new Panel(array(
				'content' => $this->load->view('front', $category),
				'body'    => FALSE
			));
		}
		
		if (empty($panels))
		{
			$panels[] = new Panel(array(
				'title'   => 'Forum',
				'icon'    => 'fa-comments',
				'style'   => 'panel-info',
				'content' => '<div class="text-center">Il n\'y a pas de forum pour le moment</div>'
			));
		}
		
		if ($this->user())
		{
			$actions = new Panel(array(
				'content' => '<a class="btn btn-default" href="'.url('forum/mark-all-as-read.html').'" data-toggle="tooltip" title="Marquer tous les messages comme étant lus">'.icon('fa-eye').'</a>',
				'body'    => FALSE,
				'style'   => 'panel-back text-right'
			));

			array_unshift($panels, $panels[] = $actions);
		}

		return $panels;
	}
}

/*
Dungeon theme 1.0 for NeoFrag Alpha 0.1.2
./themes/dungeon/overrides/modules/forum/controllers/index.php
*/