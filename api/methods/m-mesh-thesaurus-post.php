<?php$route = '/mesh_thesaurus/';$app->post($route, function ()  use ($app){	$request = $app->request();	$_GET = $request->params();	if(isset($_GET['mesh_id'])){ $mesh_id = $_GET['mesh_id']; } else { $mesh_id = '';}	if(isset($_GET['mesh_term'])){ $mesh_term = $_GET['mesh_term']; } else { $mesh_term = '';}		$query = "INSERT INTO mesh_thesaurus(";		if(isset($mesh_id)){ $query .= $mesh_id . ","; }		if(isset($mesh_term)){ $query .= $mesh_term . ","; }		$query .= ") VALUES(";		if(isset($mesh_id)){ $query .= "'" . mysql_real_escape_string($mesh_id) . "',"; }		if(isset($mesh_term)){ $query .= "'" . mysql_real_escape_string($mesh_term) . "',"; }		$query .= ")";		mysql_query($query) or die('Query failed: ' . mysql_error());		$ReturnObject = array();		$ReturnObject['message'] = "Mesh_thesaurus Added!";	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>