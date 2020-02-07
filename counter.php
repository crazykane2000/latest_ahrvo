<?php
	$data = file_get_contents("http://13.233.7.230:3003/api/dataManager/explorer");
    $data = json_decode($data,true);
    //echo count($data);
    //print_r($data);
    $count=0;

    foreach ($data as $key => $value) {
    	$count+=count($value['transactions']);
    }

   $timestamp= $data[1]['timestamp']-$data[0]['timestamp'];
    echo count($data)." -- ".$count." -- ".$timestamp;
?>