<?php

$username = $_POST['user'];
	echo $username;
	$password = $_POST['password'];
	echo $password;
	$is_ssid = 'false';
	session_start();
	if(empty($_POST['user']))
		echo "Please enter your username!";
	if(empty($_POST['password']))
		echo "Please enter your correct password!";
	$_SESSION['username'] = $username;
	//echo "<br />".$username1;
	$_SESSION['pass'] = $password;
	//echo $password1;
	$data = array( 
		"email" => "$username",
		"secret" => "$password",
		"is_ssid" => "$is_ssid"
		
		);
	$data_string = http_build_query($data);
	$u = getenv('NEBULA_HOST');
    if($u == null)
    {
        $link_url = 'ssbox-dev.unicloud.org.tw';
    }
    else
    {
        $link_url = $u;
    }
	$url = "https://".$link_url."/api/token";
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	$result = curl_exec($ch);
	//echo($result).PHP_EOL;
	curl_close($ch);
	//var_dump(json_decode($result));
	$data = json_decode($result, true);
	if( empty($data['token']))
	{
		header("Location: i1.php");
	}
	else
	{
		$_SESSION['token'] = $data['token']; 
		header("Location: index.php");
	}
?>

	

