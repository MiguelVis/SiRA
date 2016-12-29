<?php

	// +------------------------+
	// | SiRA : Simple REST Api |
	// +------------------------+
	//
	// Test resource: post.
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
	
	function test_post($params)
	{
		$reply = array(
			'reply' => 'Hello from test_post()'
		);
		
		return $reply;
	}
?>