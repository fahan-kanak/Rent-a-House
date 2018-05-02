<?php
    session_start();
    $con = mysqli_connect("localhost", "root", "password");
    if (!$con) {
        exit('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
    }
    //set the default client character set 
    mysqli_set_charset($con, 'utf-8');

    mysqli_select_db($con, "Rent_a_House"); 
    $area = $_POST["area"];
    $city = $_POST["city"];
    $size_low_value = $_POST["size_low_value"];
    $size_high_value = $_POST["size_high_value"];
    $rent_low_value = $_POST["rent_low_value"];
    $rent_high_value = $_POST["rent_high_value"];
    $garage = $_POST["garage"];
    if ((strlen($size_low_value) == 0) && (strlen($size_high_value) == 0)) {
        if ((strlen($rent_low_value) == 0) && (strlen($rent_high_value) == 0)) {
            if (strlen($garage) == 0) {
                $result = mysqli_query($con, "select * from Property_info natural join Available where Available=true and Area='".$area."' and City='".$city."';");
            } else {
                $result = mysqli_query($con, "select * from Property_info natural join Available where Available=true and Area='".$area."' and City='".$city."' and Garage=".$garage.";");
            }
        } else {
            if (strlen($garage) == 0) {
                $result = mysqli_query($con, "select * from Property_info natural join Available where Available=true and Area='".$area."' and City='".$city."' and Monthly_rent between ".$rent_low_value." and ".$rent_high_value.";");
            } else {
                $result = mysqli_query($con, "select * from Property_info natural join Available where Available=true and Area='".$area."' and City='".$city."' and Monthly_rent between ".$rent_low_value." and ".$rent_high_value." and Garage=".$garage.";");
            }
        }
    } else {
        if ((strlen($rent_low_value) == 0) && (strlen($rent_high_value) == 0)) {
            if (strlen($garage) == 0) {
                $result = mysqli_query($con, "select * from Property_info natural join Available where Available=true and Area='".$area."' and City='".$city."' and Size between ".$size_low_value." and ".$size_high_value.";");
            } else {
                $result = mysqli_query($con, "select * from Property_info natural join Available where Available=true and Area='".$area."' and City='".$city."' and Size between ".$size_low_value." and ".$size_high_value." and Garage=".$garage.";");
            }
        } else {
            if (strlen($garage) == 0) {
                $result = mysqli_query($con, "select * from Property_info natural join Available where Available=true and Area='".$area."' and City='".$city."' and Size between ".$size_low_value." and ".$size_high_value." and Monthly_rent between ".$rent_low_value." and ".$rent_high_value.";");
            } else {
                $result = mysqli_query($con, "select * from Property_info natural join Available where Available=true and Area='".$area."' and City='".$city."' and Size between ".$size_low_value." and ".$size_high_value." and Monthly_rent between ".$rent_low_value." and ".$rent_high_value." and Garage=".$garage.";");
            }
        }       
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $properties[] = $row;
    }
    mysqli_free_result($result);
    mysqli_close($con);
    
    echo json_encode($properties);