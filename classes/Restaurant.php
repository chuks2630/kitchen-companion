<?php

class Restaurant{

    public function get_restaurants(){


        $curl = curl_init();
        
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://tripadvisor16.p.rapidapi.com/api/v1/restaurant/searchRestaurants?locationId=8537637",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: tripadvisor16.p.rapidapi.com",
                "x-rapidapi-key: 2a873f6fd8msh5b95f85947b8b1dp1094fcjsn42788df73a15"
            ],
        ]);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            // echo "cURL Error #:" . $err;
        } else {
            $resp = json_decode($response);
            return $resp;
          
        }
}
}

?>