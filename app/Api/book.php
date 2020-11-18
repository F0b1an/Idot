<?php

// change date format to ddmmyyyy
$date_from = date("dmY", strtotime($_POST['date_from']));
$date_to = date("dmY", strtotime($_POST['date_to']));

// put form data in array
$data = [
	'product' => $_POST['product'],
	'occupant' => $_POST['occupant'],
	'date_from' => $date_from,
	'date_to' => $date_to,
	'order' => [
		'contact_email' => $_POST['contact_email'],
		'address' => $_POST['address'],
	],
];

// convert array to json 
$data = json_encode($data);

// send json to API
$curl = curl_init();

curl_setopt_array($curl, array(
  	CURLOPT_URL => "http://tst.paradiso.w20e.com/api/v1/bookings/",
  	CURLOPT_RETURNTRANSFER => true,
  	CURLOPT_TIMEOUT => 30,
  	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  	CURLOPT_CUSTOMREQUEST => "POST",
  	CURLOPT_POSTFIELDS => $data,
  	CURLOPT_HTTPHEADER => array(
    	'Content-Type: application/json',                              
    	'Content-Length: ' . strlen($data),
  	),
));

// send POST request
$response = curl_exec($curl);
$err = curl_error($curl);
// close connection
curl_close($curl);