<?php
//sign into database
    $servername = "192.168.56.101";
    $username = "nicQuery";
    $password = "Benedictine20";
    $schema = "Inventory";
    
    //establish variables to be passed to database
    $itemID = '"' . $_POST['itemID'] . '"';
    // $itemID = 1;
    
    //create connection
    $con = mysqli_connect($servername, $username, $password, $schema);
    
    //check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $sql = "CALL selectItem($itemID);";
    if ($result = mysqli_query($con, $sql)) {
        $row = $result->fetch_object();
        $resultArray = $row;
        echo json_encode($resultArray);
    } else {
        echo "Query went wrong";
    }
    mysqli_close($con);
?>
