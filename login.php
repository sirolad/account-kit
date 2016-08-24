<?php
$app_id = '<APP_ID>';
$secret = '<SECRET>';

function doCurl($url) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $data = json_decode(curl_exec($ch), true);
  curl_close($ch);
  return $data;
}

$token_exchange_url = 'https://graph.accountkit.com/v1.0/access_token?'.
  'grant_type=authorization_code'.
  '&code='.$_POST['code'].
  "&access_token=AA|$app_id|$secret";


$data = doCurl($token_exchange_url);
$user_id = $data['id'];
$user_access_token = $data['access_token'];
$refresh_interval = $data['token_refresh_interval_sec'];

$me_endpoint_url = "https://graph.accountkit.com/v1.0/me?access_token=$user_access_token";
$data = doCurl($me_endpoint_url);

$phone = isset($data['phone']) ? $data['phone']['number'] : '';
$email = isset($data['email']) ? $data['email']['address'] : '';
?>

<html class="" id="facebook" lang="en">
<head>
  <title id="pageTitle">Welcome!</title>
  <link href="css/css1.css" rel="stylesheet" type="text/css">
  <link href="css/css2.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="_5xrk">
    <div class="_5xrl" >
      <div class="_5xra">Welcome to 6cute!</div>
    </div>
    <br /><br />
    <div class="_5xrf">
      <div class="_5xra" style="">
        <b>User ID:</b> <?php echo $user_id; ?>
        <br>
        <b>Phone Number:</b> <?php echo $phone; ?>
        <br>
        <b>Email:</b> <?php echo $email; ?>
        <br>
        <b>Access Token:</b> <?php echo $user_access_token; ?>
        <br>
        <b>Refresh Interal:</b> <?php echo $refresh_interval; ?>
       </div>
    </div>
  </div>
</body>
