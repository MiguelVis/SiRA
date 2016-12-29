<?php
	// +------------------------+
	// | SiRA : Simple REST Api |
	// +------------------------+
	//
	// Entry point.
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
	
	// Dependencies
	require_once 'cfg/cfg.php';
	require_once 'lib/common.php';
	
	// Request data: method, resource, params.
	$req_method   = strtolower($_SERVER['REQUEST_METHOD']);
	$req_resource = isset($_GET['resource']) ? strtolower($_GET['resource']) : '';
	
	if($req_method == 'get')
	{
		// Method = GET
		unset($_GET['resource']);
		
		$req_params = $_GET;
	}
	else
	{
		// Method = PUT, POST, DELETE, ...
		$req_params = json_decode(file_get_contents('php://input'), 1);
	}
	
	if(array_key_exists($req_resource, $CFG_CONTROLLERS))
	{
		if(array_key_exists($req_method, $CFG_CONTROLLERS[$req_resource]))
		{
			require_once $CFG_CONTROLLERS[$req_resource]['folder'].'/'.$CFG_CONTROLLERS[$req_resource][$req_method].'.php';
			
			$reply = $CFG_CONTROLLERS[$req_resource][$req_method]($req_params);
			
			reply_json($reply);
		}
		else
		{
			reply_json(make_error('Method not supported by resource.'));
		}
	}
	else
	{
		reply_json(make_error('Unknown resource.'));
	}
?>