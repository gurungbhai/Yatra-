
<?php
$fact=0;
session_start();
$NUMBER=0;
$a= $_SESSION['sn'];
echo $a;
echo "<br>";
$recharge=$_POST['recharge'];


echo "Name:";
echo $_SESSION['Name'];
echo "<br>";
echo "email=";echo $_SESSION['email'];
echo "<br>";
echo "username=";echo $_SESSION['username'];
echo "<br>";
echo "phone number=";echo $_SESSION['phone number'];
echo "<br>";
echo "address=";echo $_SESSION['address'];
echo "<br>";
echo "balance=";

$conn = new mysqli("localhost","root","","yatra card");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } 

  

    
    $sql = "SELECT * FROM user where  sn = $a;    "; 


  $result = $conn->query($sql);

  if ($result->num_rows > 0) 
  {
  
    while($row = $result->fetch_assoc())
     {
         $_SESSION['balancer']=$row["balance"];
         //echo $_SESSION['balancer'];
     }
    }
    //$conn->close();


if($recharge>0 )
{
    $sql = "SELECT * from recharge50";    
    $result = $conn->query($sql);
    $j=0;

    if ($result->num_rows > 0) 
    {
        // output data of each row
        while($row = $result->fetch_assoc())
        {

             if ($recharge==$row["number"] && $row['used']==0)
             {
                $j=$j+1;
             } 
             /*else
             {
                 echo "did not recharge";
             }*/
             
        }
        if($j>0)
        {
            $number=50;
            //$balance=$_SESSION['balance'];
            $num=$number+$_SESSION['balancer']; 
            $sql1="UPDATE recharge50 SET used=1 where number=$recharge";
            if ($conn->query($sql1) === TRUE) {
                
                //$_SESSION['balancer']=$row["balance"];
                //echo $num;
                //echo "<br>";
               // echo "Recharge  successfully";
                //include 'request.php';
               // $fact=$num;
                //$_SESSION['i']=2;
            } 
            else {
                echo "already used: " . $conn->error;
            }


            
        }
        else
        {
            
            $balancer=$_SESSION['balancer'];
            echo $balancer;
            echo "<br>";
            echo "wrong pin ";
            include 'request.php';
            
        }
    }

    if($j>0)
        {
            $sql = "UPDATE user SET balance=$num WHERE sn=$a";
            if ($conn->query($sql) === TRUE) {
                
                //$_SESSION['balancer']=$row["balance"];
                echo $num;
                echo "<br>";
                echo "Recharge  successfully";
                include 'request.php';
                $fact=$num;
                //$_SESSION['i']=2;
            } 
            else {
                echo "Error updating record: " . $conn->error;
            }
            
            
        }
       
        
    }
    $recharge=0;

 

    $conn->close();

          
?> 

