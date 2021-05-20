<?php
function curl($name, $text){
$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://omgvamp-hearthstone-v1.p.rapidapi.com/cards",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: omgvamp-hearthstone-v1.p.rapidapi.com",
		"x-rapidapi-key: 418ca8a697mshf25267b6f1285e6p18ea22jsnbbeb6dd354cd"
	],
]);

$response = curl_exec($curl);

if($response === FALSE) {
    die(curl_error($curl));
}
$responseData = json_decode($response, TRUE);

CURL_CLOSE($curl);

return($response);
}

$nameData = curl($name, "name");
$nameKeys = array_keys($nameData);

$textData = curl($text, "text");
$textKeys = array_keys($textData);

<div id="cardtemplate" class="card-deck">
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">echo $nameData[$nameKeys]['0-9']</h4>
        <p class="card-text">echo $textData[$textKeys]['0-9']</p>
    </div>
  </div>
</div>