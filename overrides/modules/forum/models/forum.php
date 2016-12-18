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

class o_m_forum_m_forum extends m_forum_m_forum
{
	public function get_forums($forum_id = NULL, $mini = FALSE)
	{
		if ($forum_id)
		{
			$this->db	->where('f.parent_id', $forum_id)
						->where('f.is_subforum', TRUE);
		}
		else
		{
			$this->db	->join('nf_forum f2', 'f2.parent_id = f.forum_id AND f2.is_subforum = "1"')
						->where('f.is_subforum', FALSE);
		}
		
		$forums = $this->db	->select(	'f.forum_id',
										'f.parent_id',
										'f.title',
										'f.description',
										!$forum_id ? 'f.count_messages + SUM(IFNULL(f2.count_messages, 0)) as count_messages' : 'f.count_messages',
										!$forum_id ? 'f.count_topics   + SUM(IFNULL(f2.count_topics, 0))   as count_topics'   : 'f.count_topics',
										'f.last_message_id',
										'u.user_id',
										'u.username',
										't.topic_id',
										't.title as last_title',
										'm.date as last_message_date',
										't.count_messages as last_count_messages',
										'u2.url',
										'u2.redirects',
										(!$forum_id ? 'COUNT(f2.forum_id)' : 0).' as subforums',
										'up.avatar',
										'up.sex'
									)
									->from('nf_forum f')
									->join('nf_forum_messages m',  'm.message_id = f.last_message_id')
									->join('nf_forum_topics t',    't.topic_id = m.topic_id')
									->join('nf_users u',           'u.user_id = m.user_id AND u.deleted = "0"')
									->join('nf_users_profiles up', 'u.user_id = up.user_id')
									->join('nf_forum_url u2',      'u2.forum_id = f.forum_id')
									->group_by('f.forum_id')
									->order_by('f.order', 'f.forum_id')
									->get();
		
		foreach ($forums as &$forum)
		{
			$forum['has_unread'] = $forum['url'] ? FALSE : $this->_has_unread($forum);

			if ($forum['subforums'])
			{
				foreach ($forum['subforums'] = $this->get_forums($forum['forum_id'], TRUE) as $subforum)
				{
					if (!$forum['has_unread'] && $subforum['has_unread'])
					{
						$forum['has_unread'] = TRUE;
					}

					if ($subforum['last_message_id'] > $forum['last_message_id'])
					{
						foreach (['last_message_id', 'user_id', 'username', 'topic_id', 'last_title', 'last_message_date', 'last_count_messages'] as $var)
						{
							$forum[$var] = $subforum[$var];
						}
					}
				}
			}
			else
			{
				$forum['subforums'] = [];
			}
			
			$forum['icon']       = icon(($forum['url'] ? 'fa-globe' : 'fa-comments'.($forum['has_unread'] ? '' : '-o')).($mini ? '' : ' fa-3x'));
		}
		
		return $forums;
	}
}

/*
Dungeon theme 1.3.2 for NeoFrag Alpha 0.1.5.3
./themes/dungeon/overrides/modules/forum/models/forum.php
*/