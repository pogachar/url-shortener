<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Account Activation</title>
</head>
<body>
  <h2>Account Activation</h2>
  
  <div>
    <p>To activate your account, click on the following link:</p>
    <p><a href="{{ URL::route('account.activation', ['id' => $user->id, 'code' => $user->activation_code]) }}">Account Activation</a></p>
  </div>
</body>
</html>