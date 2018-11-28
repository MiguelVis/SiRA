<?php

	// +------------------------+
	// | SiRA : Simple REST Api |
	// +------------------------+
	//
	// Configuration.
	//
	// (c) 2016-2018 Miguel Garcia / FloppySoftware.
	//
	// http://www.floppysoftware.es
	// floppysoftware@gmail.com
	//
	// Released under the GNU Public License v3.
	//
	// Revisions:
	//
	// 28 Dec 2016 : mgl : Start.
	// 28 Nov 2018 : mgl : Add support for HTTP basic authentication.
	
	global $CFG_SIRA;
	
	$CFG_SIRA = array(
		'http_basic_auth' => true,
		'users' => array(
			'user' => 'password',
			'anotherUser' => 'anotherPassword'
		),
		'resources' => array(
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
		)
	);

?>