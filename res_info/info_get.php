<?php
	// +------------------------+
	// | SiRA : Simple REST Api |
	// +------------------------+
	//
	// Info resource: get.
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
	// 29 Dec 2016 : mgl : Start.

	function info_get($params)
	{
		$reply = array(
			'reply' => 'Hello from info_get()'
		);
		
		return $reply;
	}
	
?>