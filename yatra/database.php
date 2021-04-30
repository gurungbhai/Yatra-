<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yatra card";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

$name  = $_POST['name'];
$email  = $_POST['email'];
$number  = $_POST['number'];
$address  = $_POST['address'];
$username  = $_POST['username'];
$password  = $_POST['password'];
$gender  = $_POST['gender'];
$retypepassword = $_POST['repassword'];


$sql = "SELECT * from user";    
    $result = $conn->query($sql);
    $i=0;

    if ($result->num_rows > 0) 
    {
        // output data of each row
        while($row = $result->fetch_assoc())
        {

 		    if ($username==$row["username"]  ) 
 		    {
                 $i=$i+1;
                    
             }
        }

    }
if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["number"]) || empty($_POST["address"]) || empty($_POST["password"]) || empty($_POST["gender"]) )
{
        echo "please insert required field";
        echo "<br>";
}
elseif($i>0)
{
    echo "username exist please try another username";
    echo "<br>";
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
{
    echo "Invalid email format";
    echo "<br>"; 
}
elseif (!preg_match("/^[a-zA-Z ]*$/",$name)) 
{

    echo "Only letters and white space allowed";
    echo "<br>"; 
}
elseif(strlen($number)!=10)
{
    echo "please insert 10 digit number";
    echo "<br>";
}
else if($password==$retypepassword )

{
    $sql = "INSERT INTO user (name,email,number,address,username,password,gender) 
    VALUES ('".$name."','".$email."','".$number."','".$address."','".$username."','".$password."','".$gender."')";
    if ($conn->query($sql) === TRUE) 
    { 

        echo "Your Form successfully submitted.. <br>";
        
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else
{
    echo "password mismatch";
    echo "<br>";
    echo "please fill form carefully";

}
$conn->close();

?>
<html>
click here for login
<a href="login.php" >clickhere</a>
</html>