# YouRL
YouRl is a Url Shortner that can be used in your PHP Applications with just 3 lines of code

#Usage

$arrYourl = [
	"longUrl" 		=> "http://www.example.com?p1=someValue&p2=someOtherValue",
	"url_type" 		=> "PAYMENT"
];

`$yourl    = new Yourl(_YOURL_API_KEY_, _YOURL_AUTH_TOKEN_);`   
`$response = $yourl->getShortUrl($arrYourl);`   
`$shortUrl = $response['shortUrl'];`  
