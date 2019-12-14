<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Lame-Translate</title>
</head>

<body>
  <h3>Login </h3>
  <form action="login.php" method="POST" enctyp="multipart/form-data">
    <label>Username</label>
    <input type="text" name="username" maxlength="30" />
    <br />
    <br />
    <label>Password</label>
    <input type="text" name="password" maxlength="30" />
    <br />
    <br />
    <button type="submit" name="submit">Login</button>
  </form>

  <hr />

  <h3>Signup </h3>
  <form action="sign_up.php" method="POST" enctyp="multipart/form-data">
    <label>Username</label>
    <input type="text" name="username" maxlength="30" />
    <br />
    <br />
    <label>Password</label>
    <input type="text" name="password" maxlength="30" />
    <br />
    <br />
    <button type="submit" name="submit">Signup</button>
  </form>
</body>

</html>