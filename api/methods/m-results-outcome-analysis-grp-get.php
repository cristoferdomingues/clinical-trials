<?php$route = '/results_outcome_analysis_grp/';$app->get($route, function ()  use ($app){	$request = $app->request();	$_GET = $request->params();	if(isset($_GET['query'])){ $query = $_GET['query']; } else { $query = '';}	if(isset($_GET['sort'])){ $sort = $_GET['sort']; } else { $sort = '';}	if(isset($_GET['page'])){ $page = $_GET['page']; } else { $page = 0;}	if(isset($_GET['count'])){ $count = $_GET['count']; } else { $count = 25;}	if(isset($_GET['in'])){ $in = $_GET['in']; } else { $in = '';}	$ReturnObject = array();	$Where = "ID IS NOT NULL";	if($in != '')		{		$inArray = explode(',',$in);		foreach($inArray as $item)			{			$Where .= " OR " . $item . " LIKE '%" . $query . "%'";			}		}	if($query=='')		{		$Query = "SELECT * FROM results_outcome_analysis_grp WHERE " . $Where ;		}	else		{		$Query = "SELECT * FROM results_outcome_analysis_grp";		}	if($sort!='')		{		$Query .= " ORDER BY " . $sort . " ASC";		}	$Query .= " LIMIT " . $page . "," . $count;	$DatabaseResult = mysql_query($Query) or die('Query failed: ' . mysql_error());	while ($Database = mysql_fetch_assoc($DatabaseResult))		{		$ID = $Database['ID'];		$results_outcome_anal_grp_id = $Database['results_outcome_anal_grp_id'];		$results_outcome_analysis_id = $Database['results_outcome_analysis_id'];		$arm_group_id = $Database['arm_group_id'];		$F = array();		$F['ID'] = $ID;		$F['results_outcome_anal_grp_id'] = $results_outcome_anal_grp_id;		$F['results_outcome_analysis_id'] = $results_outcome_analysis_id;		$F['arm_group_id'] = $arm_group_id;		array_push($ReturnObject, $F);		}	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>