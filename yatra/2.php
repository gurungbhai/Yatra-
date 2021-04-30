<?php

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// Create connection
$conn = new mysqli("localhost","root","","yatra card");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } 

    if ($username =="owner")
    {
        $sql = "SELECT * from owner";    
        $result = $conn->query($sql);
        $j=0;
    
        if ($result->num_rows > 0) 
        {
            // output data of each row
            while($row = $result->fetch_assoc())
            {
    
                 if ($username==$row["username"]  && $password ===$row["password"]) 
                 {
                     $j=$j+1;
                     echo "Name=" ;echo "<td>" . $row["name"]. "</td>"  ;
                     echo "<br>";
                     echo "username=" ;echo "<td>" . $row["username"]. "</td>"  ;
                     echo "<br>";
                     echo "balance=" ;echo "<td>" .$row["balance"]. "</td>"  ;
                    echo "<br>";
                }
                 
            }
    
        }
        if ($j==0)
        {
            echo "owner not logged in";
            //include 'index.html';
    
        }
        else
        {
            //include 'loginsucess.php';
            //include 'requirementsform.php';
            echo "owner  loged in";    
    
        }
    }
    else
    {
    $sql = "SELECT * from user";    
    $result = $conn->query($sql);
    $i=0;

    if ($result->num_rows > 0) 
    {
        // output data of each row
        while($row = $result->fetch_assoc())
        {

 		    if ($username==$row["username"]  && $password ===$row["password"]) 
 		    {
                 $i=$i+1;
                    $id=$row['sn'];

                     $_SESSION['sn']=$id;
                     $_SESSION['Name']=$row["name"];
                     $_SESSION['email']=$row["email"];
    
                     $_SESSION['username']=$row["username"];
                     $_SESSION['phone number']=$row["number"];
                     $_SESSION['balance']=$row["balance"];
                     $_SESSION['address']=$row["address"];

                     
                     echo "Name=" ;echo "<td>" . $row["name"]. "</td>"  ;
                    echo "<br>";
                    echo "E-mail=" ;echo "<td>" . $row["email"]. "</td>"  ;
                    echo "<br>";
                    echo "number=" ;echo "<td>" .$row["number"]. "</td>"  ;
                    echo "<br>";
                    echo "address=" ;echo "<td>" . $row["address"]. "</td>"  ;
                    echo "<br>";
                    echo "username=" ;echo "<td>" . $row["username"]. "</td>"  ;
                    echo "<br>";
                    echo "gender=" ;echo "<td>" . $row["gender"]. "</td>"  ;
                    echo "<br>";
                    echo "balance=" ;echo "<td>" . $row["balance"]. "</td>"  ;
                    echo "<br>";
 			    //echo "Welcome ";
            }
             /*else 
            {
                echo "failed";

            }*/
        }

    }
    if ($i==0)
    {
        echo "<br>";
		echo "failed to logged in";
		//include 'index.html';

    }


    else
    {
        //include 'loginsucess.php';
        //include 'requirementsform.php';
        include 'request.php';
        echo "<br>";
        echo "you hab loged in";    

    }
}
 



 $conn->close();



 ?>