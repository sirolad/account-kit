<html>
<head>
  <title>Login</title>
  <link href="css/css1.css" rel="stylesheet" type="text/css">
  <link href="css/css2.css" rel="stylesheet" type="text/css">
  <script src="https://sdk.accountkit.com/en_US/sdk.js"></script>
</head>
<body>
  <div class="_5xrk">
    <div class="_5xrl" >
      <div class="_5xra">Log into 6cute</div>
    </div>
    <br /><br />
    <div class="_5xrf">
      <div class="_5xre">
        <input class="_55r1 _5xrg _2njm _20um" value="+1" id="country" />
        <input class="inputtext _55r1 _5xrg _5xrh" placeholder="phone number" id="phone" />
        <button class="_5xrj" type="submit" onclick="smsLogin()">Login via SMS</button>
      </div>
      <div class="_5xra" style="">OR</div>
      <div class="_5xre">
        <input class="inputtext _55r1 _5xrg _5xrh" style="width: 712px;" placeholder="email" id="email" />
        <button class="_5xrj" type="submit" onclick="emailLogin()">Login via Email</button>
      </div>
    </div>
    <form action="login.php" id="form" method="post">
      <input id="csrf" type="hidden" name="csrf" />
      <input id="code" type="hidden" name="code" />
    </form>
  </div>
</body>
<script>
AccountKit_OnInteractive = function() {
  AccountKit.init({
    appId: '<APP_ID>',
    state: '<?php echo bin2hex(openssl_random_pseudo_bytes(32)); ?>',
    version: 'v1.0'
  });
};

function loginCallback(response) {
  console.log(response);
  if (response.status === "PARTIALLY_AUTHENTICATED") {
    document.getElementById('code').value = response.code;
    document.getElementById('csrf').value = response.state;
    document.getElementById('form').submit();
  }
}

function smsLogin() {
  var countryCode = document.getElementById('country').value;
  var phoneNumber = document.getElementById('phone').value;
  AccountKit.login(
    'PHONE',
    {countryCode: countryCode, phoneNumber: phoneNumber},
    loginCallback
  );
}

// email form submission handler
function emailLogin( ){
  var emailAddress = document.getElementById("email").value;
  AccountKit.login('EMAIL', {emailAddress: emailAddress}, loginCallback);
}
</script>
</html>
