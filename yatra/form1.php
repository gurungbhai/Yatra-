<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  




<h2>YATRA CARD REQUEST FORM</h2>
<p><span class="error">* required field</span>
<form method="post" action="database.php">  
  Name: <input type="text" name="name"><span class="error">*</span>
  <br><br>
  E-mail: <input type="text" name="email"><span class="error">*</span>
  <br><br>
  phone number: <input type="text" name="number"><span class="error">*</span>
  <br><br>
  Address:<input type="text" name ="address"><span class="error">*</span>
   <br><br>
  username:<input type="text" name="username"><span class="error">*</span>
 <BR><br>
  Password:<input type="password" name="password"><span class="error">*</span>
  <br><br>
  Retype password:<input type="password" name="repassword"><span class="error">*</span>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other<span class="error">*</span>
  <br><br>
  
  <input type="submit" name="submit" value="Submit">  
</form>
<a href="login.php">Already a user</a>

</body>
</html>