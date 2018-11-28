<?php
	// +------------------------+
	// | SiRA : Simple REST Api |
	// +------------------------+
	//
	// Common functions.
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
	
	// Output reply as JSON
	function reply_json($data)
	{
		header('Content-Type: application/json; charset=utf8');
		
		echo(json_encode($data));
	}

	// Make error message
	function make_error($message)
	{
		$arr = array(
			'error' => $message
		);
		
		return $arr;
	}
	
?>