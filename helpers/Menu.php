<?php

/**
 * Menu Items
 * All Project Menu
 * @category  Menu List
 */

class Menu
{


	public static $navbarsideleft = array(
		array(
			'path' => 'home',
			'label' => 'Home',
			'icon' => '<i class="fa fa-home "></i>'
		),

		array(
			'path' => 'tb_agenda',
			'label' => 'Entri Agenda',
			'icon' => '<i class="fa fa-calendar-plus-o "></i>'
		),

		// array(
		// 	'path' => 'tb_rrutama',
		// 	'label' => 'RR Utama',
		// 	'icon' => '<i class="fa fa-building "></i>'
		// ),

		// array(
		// 	'path' => 'tb_rratas', 
		// 	'label' => 'RR Atas', 
		// 	'icon' => '<i class="fa fa-building-o "></i>'
		// ),

		// array(
		// 	'path' => 'v_agenda', 
		// 	'label' => 'Agenda Bappeda', 
		// 	'icon' => '<i class="fa fa-calendar "></i>'
		// ),
		array(
			'path' => 'tb_rr',
			'label' => 'Ruang Rapat',
			'icon' => '<i class="fa fa-calendar "></i>'
		),
		array(
			'path' => 'user',
			'label' => 'User',
			'icon' => '<i class="fa fa-user "></i>'
		)
	);
}
