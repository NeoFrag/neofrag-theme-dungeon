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

class o_m_news_c_index extends m_news_c_index
{
	public function index($news)
	{
		if (empty($news))
		{
			return $this->panel()
						->heading('Actualités', 'fa-file-text-o')
						->body('<div class="text-center">Aucune actualité n\'a été publiée pour le moment</div>')
						->color('info');
		}
		else
		{
			return $this->view('index', [
				'news'       => $news,
				'pagination' => $this->pagination->get_pagination()
			]);
		}
	}

	public function _tag($tag, $news)
	{
		$this->subtitle($this->lang('tag', $tag));
		return $this->_filter2($news, $this->lang('news').' <small>'.$tag.'</small>');
	}
	
	public function _category($title, $news)
	{
		$this->subtitle($this->lang('category_', $title));
		return $this->_filter2($news, $this->lang('category_news').' <small>'.$title.'</small>');
	}

	protected function _filter2($news, $filter)
	{
		$news = [$this->index($news)];
		
		array_unshift($news, $this->panel()->body('<h2 class="no-margin">'.$filter.$this->button()->tooltip($this->lang('show_more'))->icon('fa-close')->url('news')->color('danger pull-right')->compact()->outline().'</h2>'));

		return $news;
	}

	public function _news($news_id, $category_id, $user_id, $image_id, $date, $published, $views, $vote, $title, $introduction, $content, $tags, $category_name, $category_title, $image, $category_icon, $username, $admin, $online, $quote, $avatar, $sex)
	{
		$this->title($title);
		
		return [
			$this->row(
				$this->col(
					$this	->panel()
							->body($this->view('suite', [
								'news_id'        => $news_id,
								'category_id'    => $category_id,
								'user_id'        => $user_id,
								'image_id'       => $image_id,
								'date'           => $date,
								'views'          => $views,
								'vote'           => $vote,
								'title'          => $title,
								'introduction'   => bbcode($introduction),
								'content'        => bbcode($content),
								'tags'           => $tags,
								'image'          => $image,
								'category_icon'  => $category_icon,
								'category_name'  => $category_name,
								'category_title' => $category_title,
								'username'       => $username,
								'avatar'         => $avatar,
								'sex'            => $sex
							]), FALSE)
				)
			),
			$this->row(
				$this->col(
					$this	->panel()
							->heading('À propos de l\'auteur', 'fa-user')
							->body($this->view('author', [
								'user_id'  => $user_id,
								'username' => $username,
								'avatar'   => $avatar,
								'sex'      => $sex,
								'admin'    => $admin,
								'online'   => $online,
								'quote'    => $quote
							]))
							->size('col-md-6')
				),
				$this->col(
					$this	->panel()
							->heading('Autres actualités de l\'auteur', 'fa-file-text-o')
							->body($this->view('author_news', [
								'news' => $this->model()->get_news_by_user($user_id, $news_id)
							]), FALSE)
							->size('col-md-6')
				)
			),
			$this->comments->display('news', $news_id)
		];
	}
}

/*
Dungeon theme 1.4 for NeoFrag Alpha 0.1.6
./themes/dungeon/overrides/modules/news/controllers/index.php
*/