<?php
session_start();
//Creates new record as per request
    //Connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "yatra card";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }

    //Get current date and time
    ?>
    <html>
    <body>
    <h3> WEB PAGE DATA </h3>
    </body>
    </html>

    <?php
   date_default_timezone_set('Asia/Kathmandu');
    $d = date("Y-m-d");
    echo "\n";
    //echo " Date:".$d."<BR>";
    echo "time:";
    $t = date("H:i:s");
    echo $t;
    echo "\n";

    if(!empty($_POST['id']) )
    {
        $id = $_POST['id'];
        //$initialstep=$_POST['initialstep'];
        $finalstep=$_POST['finalstep'];
    	
        echo $id;
        $_SESSION['id1']=$id;
        echo "\n";
        $f=$_SESSION['id1'];
        echo $f;
        echo "\n";
        //echo $initialstep;
        echo "\n";
        echo $finalstep;
        echo "\n";
     
        
        $sql1 = "SELECT * from card";    
        $result = $conn->query($sql1);
        $j=0;
    
        if ($result->num_rows > 0) 
        {
            // output data of each row
            while($row = $result->fetch_assoc())
            {
    
                 if ($id==$row["cardpin"] ) 
                 {
    
                    $j=$j+1;
                    $_SESSION['ID']=$row["ID"];
                    $a=$_SESSION['ID'];
                    $_SESSION['count']=$row["count"];
                    $_SESSION['initialstep']=$row["initialstep"];
                    $_SESSION['finalstep']=$row["finalstep"];
                    
                    $b=$_SESSION['count'];
                    $d=$_SESSION['initialstep'];
                    $e=$_SESSION['finalstep'];
                    echo "\n";
                    echo "initial step=";echo $d;
                    echo "\n";
                    echo "finalstep="; echo $e;
                 }
                 
                 
            }
           
        
        }
        if($j>0)
        {
           // echo "rajan";
            echo $a;
            echo "\n";
            echo $b;
            $c=$b+1;
            If($c==3)
                {
                    $c=1;
                }
            if($c==1)
            {
            $sql="UPDATE card SET count=$c , initialstep=".$finalstep." where ID=$a";
            if ($conn->query($sql) === TRUE) {
                
                
                echo "\n";
                echo "initial update  successfully";
               
            } 
            else {
                echo "Error updating record: " . $conn->error;
            }
            }
            else
            {
                $sql="UPDATE card SET count=$c , finalstep=".$finalstep." where ID=$a";
            if ($conn->query($sql) === TRUE) {
                
                
                echo "\n";
                
                echo "final update  successfully";
             
            } 
            else {
                echo "Error updating record: " . $conn->error;
            }
            }
        }
        
        else
        {
            echo "no card found";
            echo "\n";
            $sql = "INSERT INTO card (cardpin)
		
                 VALUES ('".$id."')";
         
                 if ($conn->query($sql) === TRUE) {
                     echo "OK";
                 } else {
                     echo "Error: " . $sql . "<br>" . $conn->error;
                 }
        }
    

	   
        
    }
    
    
	$conn->close();
?>