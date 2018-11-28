<?php
	// +------------------------+
	// | SiRA : Simple REST Api |
	// +------------------------+
	//
	// Entry point.
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
	// 28 Nov 2018 : mgl : HTTP basic authentication. Return standard HTTP codes on methods and resources. Refactorization.
	
	// Dependencies
	require_once 'sira/config.php';
	require_once 'sira/common.php';
	
	// Check HTTP basic authentication if enabled
	if(isset($CFG_SIRA['http_basic_auth']) && $CFG_SIRA['http_basic_auth'])
	{
		$auth = false;
		
		if(isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']))
		{
			$user = $_SERVER['PHP_AUTH_USER'];
			$pass = $_SERVER['PHP_AUTH_PW'];
		
			if(array_key_exists($user, $CFG_SIRA['users']) && $CFG_SIRA['users'][$user] == $pass)
			{
				$auth = true;
			}
		}
		
		if(!$auth)
		{
			http_response_code(401); // Unauthorized
			exit;
		}
	}
	
	// Get HTTP method
	$method = strtolower($_SERVER['REQUEST_METHOD']);
	
	// Get resource
	if(!isset($_GET['resource']))
	{
		http_response_code(400); // Bad Request
		exit;
	}
	
	$resource = strtolower($_GET['resource']);
	
	unset($_GET['resource']);
	
	// Get parameters (via URL or in BODY)
	if($method == 'get')
	{
		// Method GET		
		$params = isset($_GET) ? $_GET : array();
	}
	else
	{
		// Method PUT, POST, DELETE, ...
		$params = json_decode(file_get_contents('php://input'), true);
		
		if($params === NULL) {
			http_response_code(400); // Bad Request
			exit;
		}
	}
	
	// Call resource controller
	if(array_key_exists($resource, $CFG_SIRA['resources']))
	{
		if(array_key_exists($method, $CFG_SIRA['resources'][$resource]))
		{
			// Include controller source
			require_once $CFG_SIRA['resources'][$resource]['folder'] . '/' . $CFG_SIRA['resources'][$resource][$method] . '.php';
			
			// Call controller and get reply data
			$reply = $CFG_SIRA['resources'][$resource][$method]($params);
			
			// Send reply data as JSON
			reply_json($reply);
		}
		else
		{
			http_response_code(405); // Method Not Allowed
			exit;
		}
	}
	else
	{
		http_response_code(404); // Not Found
		exit;
	}
?>