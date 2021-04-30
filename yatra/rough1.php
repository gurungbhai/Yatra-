<?php
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
   date_default_timezone_set('Asia/Kolkata');
    $d = date("Y-m-d");
    //echo " Date:".$d."<BR>";
    $t = date("H:i:s");

    if(!empty($_POST['rate']) && !empty($_POST['temp']))
    {
    	$id = $_POST['id'];
    	$temp = $_POST['temp'];
        $rate = $_POST['rate'];
        echo $id;
        echo $temp;
        echo $rate;

	    $sql = "INSERT INTO details (sid, temp, rate, s)
		
		VALUES ('".$id."', '".$temp."', '".$rate."', '".$t."')";

		if ($conn->query($sql) === TRUE) {
		    echo "OK";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}


	$conn->close();
?>