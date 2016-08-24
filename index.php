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
function smsLogin() {
}

function emailLogin( ){
}
</script>
</html>
