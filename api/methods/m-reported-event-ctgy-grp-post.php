<?php$route = '/reported_event_ctgy_grp/';$app->post($route, function ()  use ($app){	$request = $app->request();	$_GET = $request->params();	if(isset($_GET['reported_event_catgy_grp_id'])){ $reported_event_catgy_grp_id = $_GET['reported_event_catgy_grp_id']; } else { $reported_event_catgy_grp_id = '';}	if(isset($_GET['reported_event_category_id'])){ $reported_event_category_id = $_GET['reported_event_category_id']; } else { $reported_event_category_id = '';}	if(isset($_GET['arm_group_id'])){ $arm_group_id = $_GET['arm_group_id']; } else { $arm_group_id = '';}	if(isset($_GET['subjects_affected'])){ $subjects_affected = $_GET['subjects_affected']; } else { $subjects_affected = '';}	if(isset($_GET['subjects_at_risk'])){ $subjects_at_risk = $_GET['subjects_at_risk']; } else { $subjects_at_risk = '';}	if(isset($_GET['events'])){ $events = $_GET['events']; } else { $events = '';}		$query = "INSERT INTO reported_event_ctgy_grp(";		if(isset($reported_event_catgy_grp_id)){ $query .= $reported_event_catgy_grp_id . ","; }		if(isset($reported_event_category_id)){ $query .= $reported_event_category_id . ","; }		if(isset($arm_group_id)){ $query .= $arm_group_id . ","; }		if(isset($subjects_affected)){ $query .= $subjects_affected . ","; }		if(isset($subjects_at_risk)){ $query .= $subjects_at_risk . ","; }		if(isset($events)){ $query .= $events . ","; }		$query .= ") VALUES(";		if(isset($reported_event_catgy_grp_id)){ $query .= "'" . mysql_real_escape_string($reported_event_catgy_grp_id) . "',"; }		if(isset($reported_event_category_id)){ $query .= "'" . mysql_real_escape_string($reported_event_category_id) . "',"; }		if(isset($arm_group_id)){ $query .= "'" . mysql_real_escape_string($arm_group_id) . "',"; }		if(isset($subjects_affected)){ $query .= "'" . mysql_real_escape_string($subjects_affected) . "',"; }		if(isset($subjects_at_risk)){ $query .= "'" . mysql_real_escape_string($subjects_at_risk) . "',"; }		if(isset($events)){ $query .= "'" . mysql_real_escape_string($events) . "',"; }		$query .= ")";		mysql_query($query) or die('Query failed: ' . mysql_error());		$ReturnObject = array();		$ReturnObject['message'] = "Reported_event_ctgy_grp Added!";	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>