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

class o_w_user_c_index extends w_user_c_index
{
	public function index($config = array())
	{
		if ($this->user())
		{
			return new Panel(array(
				'title'   => 'Espace membre',
				'icon'    => 'fa-lock',
				'content' => $this->load->view('logged', array(
					'username' => $this->user('username')
				)),
				'footer'  => '<a href="'.url('user/logout.html').'"><i class="fa fa-close"></i> Se déconnecter</a>'
			));
		}
		else
		{
			return new Panel(array(
				'title'   => 'Espace membre',
				'icon'    => 'fa-unlock-alt',
				'content' => $this->load->view('index', array(
					'form_id' => '6e0fbe194d97aa8c83e9f9e6b5d07c66'
				))
			));
		}
	}
}

/*
Dungeon theme 1.0 for NeoFrag Alpha 0.1.2
./themes/dungeon/overrides/widgets/user/controllers/index.php
*/