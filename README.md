# YouRL
YouRl is a Url Shortner that can be used in your PHP Applications with just 3 lines of code

#Usage

$arrYourl = [
	"longUrl" 		=> "http://www.example.com?p1=someValue&p2=someOtherValue",
	"url_type" 		=> "PAYMENT"
];

_$yourl 	  = new Yourl(YOURL_API_KEY, YOURL_AUTH_TOKEN);_
_$response = $yourl->getShortUrl($arrYourl);_
_$shortUrl = $response['shortUrl'];_
