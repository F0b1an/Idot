<?php

Class Api
{
	// get hotels from the API
	public static function fetchHotels()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  	CURLOPT_URL => "http://tst.paradiso.w20e.com/api/v1/hotels/",
		  	CURLOPT_RETURNTRANSFER => true,
		  	CURLOPT_TIMEOUT => 30,
		  	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  	CURLOPT_CUSTOMREQUEST => "GET",
		  	CURLOPT_HTTPHEADER => array(
		    	"cache-control: no-cache"
		  	),
		));

		// send GET request
		$response = curl_exec($curl);
		$err = curl_error($curl);
		// close connection		
		curl_close($curl);
		// convert json to array
		$hotels = json_decode($response, true);
		// return the array
		return $hotels;
	}
    

}