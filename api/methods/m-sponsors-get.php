<?php$route = '/sponsors/';$app->get($route, function ()  use ($app){	$request = $app->request();	$_GET = $request->params();	if(isset($_GET['query'])){ $query = $_GET['query']; } else { $query = '';}	if(isset($_GET['sort'])){ $sort = $_GET['sort']; } else { $sort = '';}	if(isset($_GET['page'])){ $page = $_GET['page']; } else { $page = 0;}	if(isset($_GET['count'])){ $count = $_GET['count']; } else { $count = 25;}	if(isset($_GET['in'])){ $in = $_GET['in']; } else { $in = '';}	$ReturnObject = array();	$Where = "ID IS NOT NULL";	if($in != '')		{		$inArray = explode(',',$in);		foreach($inArray as $item)			{			$Where .= " OR " . $item . " LIKE '%" . $query . "%'";			}		}	if($query=='')		{		$Query = "SELECT * FROM sponsors WHERE " . $Where ;		}	else		{		$Query = "SELECT * FROM sponsors";		}	if($sort!='')		{		$Query .= " ORDER BY " . $sort . " ASC";		}	$Query .= " LIMIT " . $page . "," . $count;	$DatabaseResult = mysql_query($Query) or die('Query failed: ' . mysql_error());	while ($Database = mysql_fetch_assoc($DatabaseResult))		{		$ID = $Database['ID'];		$sponsor_id = $Database['sponsor_id'];		$nct_id = $Database['nct_id'];		$sponsor_type = $Database['sponsor_type'];		$agency = $Database['agency'];		$agency_class = $Database['agency_class'];		$F = array();		$F['ID'] = $ID;		$F['sponsor_id'] = $sponsor_id;		$F['nct_id'] = $nct_id;		$F['sponsor_type'] = $sponsor_type;		$F['agency'] = $agency;		$F['agency_class'] = $agency_class;		array_push($ReturnObject, $F);		}	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>