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
	public function index($config = [])
	{
		if ($this->user())
		{
			$this->css('user');

			return $this->panel()
						->heading($this->lang('member_area'), 'fa-lock')
						->body($this->view('logged', [
							'username' => $this->user('username')
						]), FALSE)
						->footer('<a href="'.url('user/logout').'">'.icon('fa-close').' '.$this->lang('logout').'</a>');
		}
		else
		{
			return $this->panel()
						->heading($this->lang('member_area'), 'fa-unlock-alt')
						->body($this->view('index', [
							'form_id' => $this->form->token('6e0fbe194d97aa8c83e9f9e6b5d07c66')
						]));
		}
	}
}

/*
Dungeon theme 1.4 for NeoFrag Alpha 0.1.6
./themes/dungeon/overrides/widgets/user/controllers/index.php
*/