<?php

	// +------------------------+
	// | SiRA : Simple REST Api |
	// +------------------------+
	//
	// Configuration.
	//
	// (c) 2016 Miguel Garcia / FloppySoftware.
	//
	// http://www.floppysoftware.es
	// floppysoftware@gmail.com
	//
	// Released under the GNU Public License v3.
	//
	// Revisions:
	//
	// 28 Dec 2016 : mgl : Start.

	global $CFG_CONTROLLERS;
	
	$CFG_CONTROLLERS = array(
		'test' => array(
			'folder' => 'res_test',
			'get'    => 'test_get',
			'put'    => 'test_put',
			'post'   => 'test_post',
			'delete' => 'test_delete'
		),
		'info' => array(
			'folder' => 'res_info',
			'get'    => 'info_get'
		)
	);
?>