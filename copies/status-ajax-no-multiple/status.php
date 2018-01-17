<?php

//extract data from the post
//set POST variables
$url = 'http://e.losmetas.com/click.php?cnv_id=25621b4a99la0c&cnv_status=newwww';
//$fields = array(
//    'clickId' => urlencode($_POST['clickId']),
//    'status' => urlencode($_POST['status']),
//);

//url-ify the data for the POST
//foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
//rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch, $url);
//curl_setopt($ch,CURLOPT_POST, count($fields));
//curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
curl_exec($ch);
//print $result;

//close connection
curl_close($ch);


