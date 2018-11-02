<?php
/* We first connect to our database */
$connection = mysqli_connect(localhost,u945539095_abc,123456,u945539095_test);

/* Capture connection error if any */
if (mysqli_connect_errno($connection)) {
        echo "Failed to connect to DataBase: " . mysqli_connect_error();
    }
else {

  /* Declare an array containing our data points */
   $data_points = array();

  /* Usual SQL Queries */
     $query = "SELECT CONVERT_TZ(time,'+00:00','+07:00') as time,temperature,humidity FROM demo";
     $result = mysqli_query($connection, $query);

     while($row = mysqli_fetch_array($result))
        {        
      /* Push the results in our array */
            $point = array("time" => $row['time'] ,"temp" =>  $row['temperature'] ,"humi" =>  $row['humidity']);
            array_push($data_points, $point);
        }

    /* Encode this array in JSON form */
        echo json_encode($data_points, JSON_NUMERIC_CHECK);
        }
    mysqli_close($connection);
?>