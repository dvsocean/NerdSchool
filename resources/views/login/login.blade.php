<html>
  <head>
    <title>Login</title>
  </head>
  <body>
    <h2>Login Page</h2>

<form method="POST" action="/createUser">
  {{ csrf_field() }}

  <label>Name:</label><br>
  <input type="text" name="name" class="form-control"><br>

  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label>Email:</label><br>
    <input type="text" name="email" class="form-control"><br>
  </div>  

  <label>Password:</label><br>
  <input type="password" name="password" class="form-control"><br>

  <label>Verify Password:</label><br>
  <input type="password" name="verify-password" class="form-control"><br><br>

  <input type="submit" name="submit">

</form>

  </body>
</html>
