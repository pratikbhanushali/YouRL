<?php 

	/**
	 * Author 		: Pratik Bhanushali
	 * Site 		: http://www.pratikbhanushali.in
	 * Organisation : GetSetHome
	 * URL 			: https://www.getsethome.com
	 *
	 * Created On 	: 26th Feb, 2016
	 * Version 		: 1.0
	 * 
	 */

	class Yourl {

		protected $endpoint = 'http://www.yourl.co/api/';
    	protected $api_key = null;
    	protected $auth_token = null;
	
		function __construct($api_key, $auth_token=null) {
			$this->api_key = (string) $api_key;
	        $this->auth_token = (string) $auth_token;
		}

		function getShortUrl($arrParams) {
			try {

				$result = $this->doCurl($arrParams);
				return json_decode($result, true);

			} catch(Exception $e) {

			}			
		}

		private function doCurl($arrPostData) {
			try {

				if(isset($arrPostData['method']) && $arrPostData['method'] == "GET") {
					$url = $this->endpoint . "?longUrl=" . $arrPostData['longUrl'] . "&url_type=" . $arrPostData['url_type'];

					$ch	 	= curl_init($url);
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					
					$data 			= curl_exec($ch);
					$error_number 	= curl_errno($ch);
        			$error_message 	= curl_error($ch);
					
					if($error_number != 0) {
			            if($error_number == 60) {
			                throw new Exception("Something went wrong. cURL raised an error with number: $error_number and message: $error_message. " .
			                                    "Please check http://stackoverflow.com/a/21114601/846892 for a fix." . PHP_EOL);
			            } else {
			                throw new Exception("Something went wrong. cURL raised an error with number: $error_number and message: $error_message." . PHP_EOL);
			            }
			        }
			        return $data;
					// return json_decode($data, true);

				} else {

					$url 	= $this->endpoint;
					$ch	 	= curl_init($url);

					if($ch === false){
						die("Failed curl your URL");
					}
					
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $arrPostData);
					
					$data 			= curl_exec($ch);
					$error_number 	= curl_errno($ch);
        			$error_message 	= curl_error($ch);

					if($error_number != 0) {
			            if($error_number == 60) {
			                throw new Exception("Something went wrong. cURL raised an error with number: $error_number and message: $error_message. " .
			                                    "Please check http://stackoverflow.com/a/21114601/846892 for a fix." . PHP_EOL);
			            } else {
			                throw new Exception("Something went wrong. cURL raised an error with number: $error_number and message: $error_message." . PHP_EOL);
			            }
			        }

					return $data;
				
				}

			} catch(Exception $e) {

			}
		}


		private function fnMakeUrl($arrPostData){
			$url = "";

			foreach ($arrPostData as $key => $value) {
				$url .= $key."=".$value."&";
			}

			$request = substr($url, 0, strlen($url)-1);
			return $request;
		}

	}

?>